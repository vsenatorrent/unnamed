// заполнить селекты днями, годами, месяцами
const fillSelects = () => {
    // заполнить #months
    const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"];
    

    // monthNames.forEach((month, index) => {
    //     $('#months').append($('<option />').val(++index).html(month));
    // })
    $.each(monthNames, (index, month) => {
        $('#months').append($('<option />').val(++index).html(month));
    });

    // заполнить #days

    for(let i = 1; i <= 31; i++) {
        $('#days').append($('<option />').val(i).html(i));
    }

    // заполнить #years

    for(let i = new Date().getFullYear(); i >= 1970; i--) {
        $('#years').append($('<option />').val(i).html(i));
    }

}

fillSelects();

// обновить количество дней месяца в зависимости от месяца и года
const updateNumberOfDays = (year, month) => {

    const daysInMonth = new Date(year, month, 0).getDate();
    const selectedDay = $('#days').val();
    // если выбран день и его значение больше, чем количество дней в месяце
    if(!isNaN(selectedDay) && selectedDay > daysInMonth){
        $('#days').html('');
        for (let i = 1; i <= daysInMonth; i++) {
            $('#days').append($('<option />').val(i).html(i));
        }
        $('#days').val(daysInMonth).attr('selected')
    }
    
    const lastOption = $('#days option:last-child').val();
    // если количество дней в элементе #days > option меньше, чем должно быть
    if (lastOption < daysInMonth) {
        for(let i = lastOption; i <= daysInMonth; i++) {
            $('#days').append($('<option />').val(i).html(i));
        }
    }

}

// обрабатывать изменение месяца или года
$('#months, #years').on("change", function () {
    let selectedMonth = $('#months').val();
    const selectedYear = $('#years').val();
    // обновить количество дней в зависимости выбран год или нет
    isNaN(selectedYear) ? updateNumberOfDays(1970, selectedMonth) : updateNumberOfDays(selectedYear, selectedMonth)
});

const getDataInputs = (classname, bday) => {
    const dataInputs = document.querySelectorAll(classname);

    const dataObject = [...dataInputs].reduce((acc, next) => {

        const field = next.dataset.value;
        acc[field] = next.value;
        return acc;

    }, {});

    if (bday) {
        // const bdayInputsV = document.querySelectorAll(bday);

        // const bdayArrV = [...bdayInputsV].map(bdayNode => {
        //     return bdayNode.value < 10 ? '0' + bdayNode.value : bdayNode.value;
        // });

        const bdayArr = $(bday).map(function(bdayNode) {
            return $(this).val() < 10 ? '0' + $(this).val() : $(this).val();
        }).get();

        // если хотя бы одно поле даты рождения не установлено, установить дату '1970-01-01'
        if (bdayArr.some(item=>item.length === 1)){
            dataObject['bday'] = '1970-01-01';
            return dataObject;
        }

        // преобразовать дату из формата MM-DD-YYYY в YYYY-MM-DD

        [bdayArr[0], bdayArr[1], bdayArr[2]] = [bdayArr[2], bdayArr[0], bdayArr[1]];


        dataObject['bday'] = bdayArr.join('-');

        console.log(dataObject);

        return dataObject;

    };
    
    return dataObject;
};

// функция обработки события submit формы регистрации
const regFormSend = (e) => {

    e.preventDefault();

    // получить значения инпутов

    const dataObject = getDataInputs('.form__input', '.birthday__select');

    $.ajax({
        method: "POST",
        url: "reg.php",
        data: dataObject
    })
    .done(function (msg) {
        if(msg === 'error')
            $('.error').css('display', 'flex');
        if(msg === 'success')
            document.location = 'profile.php';
        // console.log(msg);
    });

}

// const regForm = document.querySelector('.reg-form');
// if(regForm) regForm.addEventListener('submit', regFormSend);

const regForm = $('.reg-form');
regForm && regForm.on('submit', regFormSend);

// функция обработки submit формы логина
const loginFormSend = (e) => {
    
    e.preventDefault();

    const dataObject = getDataInputs('.login-form__input');

    console.log(dataObject);

    $.ajax({
        method: "POST",
        url: "login.php",
        data: dataObject
    })
    .done(function (msg) {
        console.log(msg);
        if(msg === 'ok')
            document.location = 'profile.php';
        // else
        if(msg === 'error')
            $('.error').css('display', 'flex');
    });
};

// const loginForm = document.querySelector('.login-form');
// if(loginForm) loginForm.addEventListener('submit', loginFormSend);

const loginForm = $('.login-form');
loginForm && loginForm.on('submit', loginFormSend);

$('.error__close').on('click', function(){
    $(this).parent().hide();
})


// показать пароль при регистрации

$('.password__show').on('click', function(e){
    e.preventDefault();
    const passwordInput = $('.password__input');
    passwordInput.attr('type') === 'password' ? passwordInput.attr('type', 'text') : passwordInput.attr('type', 'password')
});