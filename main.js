// заполнить селекты днями, годами, месяцами
const fillSelects = () => {
    // заполнить #months
    const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"];
    

    monthNames.forEach((month, index) => {
        $('#months').append($('<option />').val(++index).html(month));
    })

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
        const bdayInputs = document.querySelectorAll(bday);

        const bdayArr = [...bdayInputs].map(bdayNode => {
            return bdayNode.value < 10 ? '0' + bdayNode.value : bdayNode.value;
        });

        // если хотя бы одно поле даты рождения не установлено, не возвращать её
        if (bdayArr.some(item=>item.length === 1)){
            return dataObject;
        }

        // преобразовать дату из формата MM-DD-YYYY в YYYY-MM-DD

        [bdayArr[0], bdayArr[1], bdayArr[2]] = [bdayArr[2], bdayArr[0], bdayArr[1]];


        dataObject['bday'] = bdayArr.join('-');

        console.log(dataObject);

        return dataObject;

    };
};

// функция обработки события submit формы регистрации
const regFormSend = (e) => {

    e.preventDefault();

    // получить значения инпутов

    const dataObject = getDataInputs('.reg-form__input', '.birthday__select');

    $.ajax({
        method: "POST",
        url: "reg.php",
        data: dataObject
    })
    .done(function (msg) {
        console.log(msg);
    });

}

const regForm = document.querySelector('.reg-form--index');
if(regForm) regForm.addEventListener('submit', regFormSend);

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
    });
};

const loginForm = document.querySelector('.login-form');
if(loginForm) loginForm.addEventListener('submit', loginFormSend);