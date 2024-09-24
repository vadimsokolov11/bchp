// Получаем форму
const form = document.querySelector('form');

// Обработчик отправки формы
form.addEventListener('submit', function(event) {
  // По умолчанию форма отправится, если валидация пройдена
  let isValid = true;

  // Получаем значения полей формы
  const name = document.getElementById('name').value.trim();
  const surname = document.getElementById('surname').value.trim();
  const phone = document.getElementById('phone').value.trim();
  const email = document.getElementById('e_mail').value.trim();
  const address = document.getElementById('address').value.trim();

  // Проверка наличия значения в поле "Имя"
  if (name === '') {
    isValid = false;
    alert('Пожалуйста, введите ваше имя');
  }

  // Проверка наличия значения в поле "Фамилия"
  if (surname === '') {
    isValid = false;
    alert('Пожалуйста, введите вашу фамилию');
  }

  // Проверка наличия значения в поле "Телефон"
  if (phone === '') {
    isValid = false;
    alert('Пожалуйста, введите ваш номер телефона');
  }

  // Проверка корректности email
  if (!isValidEmail(email)) {
    isValid = false;
    alert('Пожалуйста, введите корректный email');
  }

  // Проверка наличия значения в поле "Адрес"
  if (address === '') {
    isValid = false;
    alert('Пожалуйста, введите ваш адрес');
  }

  if (!isValid) {
    event.preventDefault(); // Отменяем отправку формы, если валидация не пройдена
  }
});

// Функция для проверки корректности email
function isValidEmail(email) {
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return email.match(emailPattern);
}