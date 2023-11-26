import React, { useState } from 'react';
import styled from 'styled-components';

const mockData = [
    "Характер та таланти",
    "Дитячо-батьківська карма",
    "Глибинні страхи та задачі роду",
    "Самореалізація та призначення",
    "Трактування карти здоров’я",
    "Рекомендації батькам щодо виховання",
    "Список літератури, аби зрозуміти свою дитину краще"
  ];

const CardContainer = styled.div`
  background-image: url('./baby-card.png');
  background-size: cover;
  background-position: center;
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 20px;
  color: white;
  width: 100%; 
  height: 100%; // Висота контейнера тепер 100% від viewport
  margin: 0 auto;
  border-radius: 30px; // Збільшено заокруглення
  margin-bottom: 20px;
  margin-top: 20px;
`;

const LeftSide = styled.div`
  display: flex;
  flex-direction: column;
  align-items: flex-start; // Елементи вирівнюються по лівому краю
`;

const CardTitle = styled.h2`
  text-align: right;
  color: white;
  font-size: 96px; // Збільшено розмір шрифту
  line-height: 1;
  margin-bottom: 30px; // Зменшено відступ знизу
`;

const Button = styled.button`
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 7px;
  padding: 10px 20px; // Збільшено розмір кнопки
  cursor: pointer;
  font-size: 20px; 
  margin-bottom: 40px; 
  align-self: end; // Вирівнювання кнопки по лівому краю
`;

const List = styled.ul`
  list-style: none;
  padding: 0;
  max-width: 600px;
  padding-right: 30px;

  .select-variant{
    margin-bottom: 0;
  }
`;

const ListItem = styled.li`
  background-color: white;
  color: #000;
  font-size: 18px;
  width: 100%;
  margin: 10px 0;
  padding: 20px;
  border-radius: 8px;
  text-align: left;
`;

const BabyCard = () => {
    const [matrixType, setMatrixType] = useState('Стандарт');

    const handleMatrixTypeChange = (selectedMatrixType: string) => {
        setMatrixType(selectedMatrixType);
    };

  return (
    <div className="container">
         <CardContainer>
      <List>
      <div className='select-variant'>
            <button className={matrixType === 'Стандарт' ? 'active default-btn child-color' : 'default-btn'} type="button" onClick={() => handleMatrixTypeChange('Стандарт')}>Стандарт</button>
            <button className={matrixType === 'Поглиблений' ? 'active deep-btn child-color' : 'deep-btn'} type="button" onClick={() => handleMatrixTypeChange('Поглиблений')}>Поглиблений</button>
        </div>
        {mockData.map((item, index) => (
          <ListItem key={index}>{item}</ListItem>
        ))}
      </List>
      <LeftSide>
        <CardTitle>Дитяча <br /> матриця</CardTitle>
        <Button>Відкрити калькулятор</Button>
      </LeftSide>
    </CardContainer>
    </div>
  );
};

export default BabyCard;
