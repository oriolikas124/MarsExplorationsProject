document.addEventListener('DOMContentLoaded', function () {
  // 1. Гамбургер-меню (открытие/закрытие)
  const hamburgerMenus = document.querySelectorAll('.hamburger-menu');
  hamburgerMenus.forEach(menu => {
    const menuIcon = menu.querySelector('.menu-icon');
    const menuContent = menu.querySelector('.menu-content');
    const closeIcon = menuContent.querySelector('.close-icon');

    // Открываем меню
    menuIcon.addEventListener('click', () => {
      menuContent.style.left = '0';
    });

    // Закрываем меню
    closeIcon.addEventListener('click', () => {
      menuContent.style.left = '-100%';
    });
  });

  // 2. Закрытие меню при скролле за пределы .failed-section
  const failedSection = document.querySelector('.failed-section');
  if (failedSection) {
    window.addEventListener('scroll', () => {
      const rect = failedSection.getBoundingClientRect();
      if (rect.bottom < 0 || rect.top > window.innerHeight) {
        // Закрываем меню
        const menuContent = failedSection.querySelector('.menu-content');
        if (menuContent) {
          menuContent.style.left = '-100%';
        }
      }
    });
  }

  // 3. Слайдер (каждая секция имеет блок .slider со своими .slider-item)
  const allSliders = document.querySelectorAll('.slider');
  allSliders.forEach(slider => {
    const sliderContent = slider.querySelector('.slider-content');
    const items = slider.querySelectorAll('.slider-item');
    const leftArrow = slider.querySelector('.left-arrow');
    const rightArrow = slider.querySelector('.right-arrow');

    let currentIndex = 0;
    const total = items.length;

    // Функция для перехода к нужному слайду
    function showSlide(index) {
      sliderContent.style.transform = `translateX(-${index * 100}%)`;
    }

    // Обработчики на стрелки
    leftArrow.addEventListener('click', () => {
      currentIndex = (currentIndex > 0) ? currentIndex - 1 : total - 1;
      showSlide(currentIndex);
    });

    rightArrow.addEventListener('click', () => {
      currentIndex = (currentIndex < total - 1) ? currentIndex + 1 : 0;
      showSlide(currentIndex);
    });
  });
});