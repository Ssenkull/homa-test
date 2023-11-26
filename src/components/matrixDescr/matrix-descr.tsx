import React, { useState } from 'react';
import styled from 'styled-components';

const Title = styled.h2`
  color: #de4604;
  text-align: left;
  font-size: 38px;
  margin-bottom: 20px;
`;

const Dropdown = styled.div`
  background-color: #f7f7f7;
  margin-bottom: 8px;
  border-radius: 8px;
  overflow: hidden;
`;

const Question = styled.div`
  padding: 20px;
  cursor: pointer;
  position: relative;
  display: flex;
  align-items: center;
  &::before {
    content: '';
    width: 8px;
    height: 8px;
    background-color: #333;
    border-radius: 50%;
    margin-right: 16px;
  }
`;

const Container = styled.div`
  width: 70%; // Встановіть ширину відповідно до вашого дизайну
  margin-bottom: 50px;  
`;

const AnswerWrapper = styled.div`
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.5s ease-in-out;
`;

const Answer = styled.div`
  padding: 15px;
  background-color: #fff;
  border-top: 1px solid #ccc;
`;

// Стилі для нового правого блоку
const FlexContainer = styled.div`
  display: flex;
  justify-content: space-between;
  align-items: flex-start; // Ensure items start from the same point vertically
`;

const RightBlock = styled.div`
  
  background-color: #fff;
  border: 1px solid #e0e0e0;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  padding: 20px;
  width: 150px; // Adjust width as necessary
  margin-top: 14%; // Adjust this to align the top of this block with the first dropdown
  height: auto; // Adjust height based on content
  // You might need to add a specific height if auto does not align it properly
`;

const RightBlockTitle = styled.h3`
  font-size: 18px;
  color: #000;
  margin-bottom: 20px;
`;

const RightBlockList = styled.ul`
  list-style: none;
  padding: 0;
  margin: 0;
  text-align: left;
`;

const RightBlockItem = styled.li`
  padding: 8px 0;
  color: #333;
  font-size: 16px;
  cursor: pointer;
  &:hover {
    color: #de4604; // Цей колір змініть на бажаний
  }
`;

// Компонент для правого блоку
const RightBlockComponent = () => {
    return (
      <RightBlock>
        <RightBlockTitle>Швидка навігація по трактуванню</RightBlockTitle>
        <RightBlockList>
          <RightBlockItem>Карма з минулого втілення</RightBlockItem>
          <RightBlockItem>Карма душі</RightBlockItem>
          <RightBlockItem>Матеріальна карма</RightBlockItem>
          <RightBlockItem>Характер та таланти</RightBlockItem>
          <RightBlockItem>Дитячо-батьківська стосунки та дитячі сценарії</RightBlockItem>
          <RightBlockItem>Зона комфорту та тачка балансу</RightBlockItem>
          <RightBlockItem>Страхи</RightBlockItem>
          <RightBlockItem>Стосунки та сексуальність</RightBlockItem>
          <RightBlockItem>Фінанси та кар’єра</RightBlockItem>
          <RightBlockItem>Родові задачі</RightBlockItem>
          <RightBlockItem>Сила роду та код внутрішньої сили</RightBlockItem>
          <RightBlockItem>Призначення</RightBlockItem>
          <RightBlockItem>Час</RightBlockItem>
          <RightBlockItem>Практика для пропрацювання</RightBlockItem>
          <RightBlockItem>Список літератури та фільмів для пропрацювання</RightBlockItem>
        </RightBlockList>
      </RightBlock>
    );
  };

//@ts-ignore
const DropdownItem = ({ question, answer }) => {
  const [isOpen, setIsOpen] = useState(false);

  const toggleDropdown = () => {
    setIsOpen(!isOpen);
  };

  return (
    <Dropdown>
      <Question onClick={toggleDropdown}>
        {question}
      </Question>
      <AnswerWrapper style={{ maxHeight: isOpen ? '100vh' : '0' }}>
        <Answer>{answer}</Answer>
      </AnswerWrapper>
    </Dropdown>
  );
};

const MatrixDescr = () => {
    const faqs = [
        { question: "Карма з минулого втілення", answer: "Відповідь на питання..." },
        { question: "Карма душі", answer: "Відповідь на питання..." },
        { question: "Матеріальна карма", answer: "Відповідь на питання..." },
        { question: "Характер та таланти", answer: "Відповідь на питання..." },
        { question: "Дитячо-батьківська стосунки та дитячі сценарії", answer: "Відповідь на питання..." },
        { question: "Зона комфорту та тачка балансу", answer: "Відповідь на питання..." },
        { question: "Страхи", answer: "Відповідь на питання..." },
        { question: "Стосунки та сексуальність", answer: "Відповідь на питання..." },
        { question: "Фінанси та кар’єра", answer: "Відповідь на питання..." },
        { question: "Родові задачі", answer: "Відповідь на питання..." },
        { question: "Сила роду та код внутрішньої сили", answer: "Відповідь на питання..." },
        { question: "Призначення", answer: "Відповідь на питання..." },
        { question: "Час", answer: "Відповідь на питання..." },
        { question: "Практика для пропрацювання", answer: "Відповідь на питання..." },
        { question: "Список літератури та фільмів для пропрацювання", answer: "Відповідь на питання..." },
        // ... інші елементи faqs ...
    ];

  return (
    <div className='container'>
      <FlexContainer>
        <Container>
          <Title>Трактування значень вашої Матриці долі</Title>
          {faqs.map((faq, index) => (
            <DropdownItem key={index} question={faq.question} answer={faq.answer} />
          ))}
        </Container>
        <RightBlockComponent />
      </FlexContainer>
    </div>
  );
};

export default MatrixDescr;
