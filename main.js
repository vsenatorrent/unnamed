const monthAbbs = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

// заполнить селекты днями, годами, месяцами
const fillSelects = () => {
    // заполнить #months
    const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"];
    

    monthNames.forEach((month, index) => {
        $('#months').append($('<option />').val(monthAbbs[index]).html(month));
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
    let selectedMonth = monthAbbs.indexOf($('#months').val());
    const selectedYear = $('#years').val();
    // обновить количество дней в зависимости выбран год или нет
    isNaN(selectedYear) ? updateNumberOfDays(1970, ++selectedMonth) : updateNumberOfDays(selectedYear, ++selectedMonth)
});

function formSend(e) {

    e.preventDefault();

    // const inpVal = document.querySelector('#name').value;
    const dataInputs = document.querySelectorAll('.reg-form__input');
    const dataArray = [...dataInputs].map((input,index) => {
        return `val${index}=${input.value}&`;
    })
    const dataString = dataArray.join('');
    console.log(dataString);

    const xhr = new XMLHttpRequest(),
        url = "reg.php";

    xhr.open('POST', url);

    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
            if(xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            };
    };

    // xhr.send('inp_name=' + inpVal);
    xhr.send(dataString);

}

const form = document.querySelector('.reg-form');
form.addEventListener('submit', formSend);

