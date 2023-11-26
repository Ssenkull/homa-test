import React from 'react';
import Slider from 'react-slick';
import styled from 'styled-components';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

// Створимо контейнер для заголовку та слайдера
const SliderContainer = styled.div`
  padding: 20px 0;
`;

// Налаштуємо стилі для заголовку
const SliderTitle = styled.h2`
  color: #fff;
  text-align: center;
  font-size: 24px;
  margin-bottom: 20px;
`;

// Додамо кастомні стилі для стрілок слайдера
const Arrow = styled.div`
  color: #fff;
  cursor: pointer;
  position: absolute;
  top: 50%;
  z-index: 2;
  &.slick-prev {
    left: -50px;
  }
  &.slick-next {
    right: -50px;
  }
  &:before {
    font-size: 30px;
  }
`;

const StyledSlider = styled(Slider)`
  .slick-track {
    display: flex;
    align-items: center;
  }
  .slick-slide {
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 150px;
    height: 150px; // Висота кожного слайду
    margin: 0 5px; // Відступи для слайдів
  }
`;

// Створимо стилізований див для кожного слайду
const Slide = styled.div`
  width: 200px !important; // Ширина слайду
  height: 100px; // Висота слайду
  background-color: #ccc;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
`;

const SliderComponent = () => {
  const settings = {
    dots: false,
    infinite: true,
    speed: 500,
    slidesToShow: 5, // Відображати 3 слайди за раз
    slidesToScroll: 1, // Прокручувати по 1 слайду
    prevArrow: <Arrow className="slick-prev" />,
    nextArrow: <Arrow className="slick-next" />,
  };

  return (
    <div className="container">
          <SliderContainer>
      <SliderTitle>Відгуки:</SliderTitle>
      <StyledSlider {...settings}>
        <Slide>1</Slide>
        <Slide>2</Slide>
        <Slide>3</Slide>
        {/* Додайте додаткові слайди за потребою */}
      </StyledSlider>
    </SliderContainer>
    </div>
  );
};

export default SliderComponent;
