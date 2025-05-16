let input = '';
const display = document.getElementById('display');

function press(val) {
    input += val;
    display.value = input;
}

function clearDisplay() {
    input = '';
    display.value = '';
}

function calculate() {
    if (!input) return;
    try {
        if (!/^[-+*/()0-9\s]+$/.test(input)) {
            display.value = 'Ошибка';
            return;
        }
        const result = Function('return (' + input + ')')();
        display.value = result;
        input = result;
    } catch {
        display.value = 'Ошибка';
    }
}
