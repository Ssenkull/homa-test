import React from 'react';
import styled from 'styled-components';

const mockData = [
    "Який знак хоч хотів подати Всесвіт через знайомство пари?",
    "Характеристика та задачі пари",
    "Пари як батьки та які діти можуть бути в пари",
    "Що може не вистачати в парі для кожного з партнерів?",
    "Що найбільше впливає на пару?",
    "Як проявляють себе партнери та що очікують один від одного",
    "Опис сексуальності в парі",
    "Як вести бюджет в парі та рекомендації щодо сімейного бізнесу",
    "Що створює проблеми в парі та можлива причина розлучення",
    "Практики та список літератури для партнерів",
  ];

const CardContainer = styled.div`
  background-image: url('./heart-card.png');
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
  font-size: 96px; // Збільшено розмір шрифту
  line-height: 1;
  margin-bottom: 30px; // Зменшено відступ знизу
`;

const Button = styled.button`
  background-color: #ff4400;
  color: white;
  border: none;
  border-radius: 7px;
  padding: 10px 20px; // Збільшено розмір кнопки
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

const CompatibilityCard = () => {
  return (
    <div className="container">
         <CardContainer>
      <LeftSide>
        <CardTitle>Матриця <br /> сумісності</CardTitle>
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

export default CompatibilityCard;
