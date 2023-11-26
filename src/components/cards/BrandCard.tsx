import React from 'react';
import styled from 'styled-components';

const mockData = [
    "Особисті якості для транслювання",
    "Професійні якості ",
    "Основні теми для транслювання особистого бренду",
    "Візуальна подача ",
    "Рекомендації щодо взаємодії з аудиторією ",
    "Мотивація, натхнення для ведення блогу",
    "Монетизація особистого бренду",
    "Що не варто транслювати в блозі?",
    "Практики"
  ];

const CardContainer = styled.div`
  background-image: url('./brand-card.png');
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
`;

const LeftSide = styled.div`
  display: flex;
  flex-direction: column;
  align-items: flex-start; // Елементи вирівнюються по лівому краю
`;

const CardTitle = styled.h2`
  text-align: left;
  color: white;
  font-size: 86px; 
  line-height: 1;
  margin-bottom: 30px; 
`;

const Button = styled.button`
  background-color: #ff4400;
  color: white;
  border: none;
  border-radius: 7px;
  padding: 10px 20px; 
  cursor: pointer;
  font-size: 20px; // Збільшено розмір шрифту в кнопці
  margin-bottom: 40px; // Збільшено відступ знизу
  align-self: start; // Вирівнювання кнопки по лівому краю
`;

const List = styled.ul`
  list-style: none;
  padding: 0;
  max-width: 600px;
  padding-right: 30px;
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

const BrandCard = () => {
  return (
    <div className="container">
         <CardContainer>
      <LeftSide>
        <CardTitle>Матриця <br /> особистого <br /> бренду</CardTitle>
        <Button>Відкрити калькулятор</Button>
      </LeftSide>
      <List>
        {mockData.map((item, index) => (
          <ListItem key={index}>{item}</ListItem>
        ))}
      </List>
    </CardContainer>
    </div>
  );
};

export default BrandCard;
