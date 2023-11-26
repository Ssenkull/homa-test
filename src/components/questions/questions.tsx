import React, { useState } from 'react';
import styled from 'styled-components';

const Title = styled.h2`
  color: #333;
  text-align: center;
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

const FAQSection = () => {
    const faqs = [
        {
          question: "Наша доля вже розписана, змінити щось не можливо?",
          answer: "Відповідь на питання..."
        },
        {
          question: "Однакова дата народження = однакова доля?",
          answer: "Відповідь на питання..."
        },
        {
          question: "Чи скаже мені матриця, коли я вийду заміж чи народжу дитину?",
          answer: "Відповідь на питання..."
        },
        {
          question: "Чим відрізняється стандарт від поглибленого розбору матриці?",
          answer: "Відповідь на питання..."
        },
        {
          question: "Чи варто мені брати розбір з консультацією?",
          answer: "Відповідь на питання..."
        },
        {
          question: "Матриця допоможе мені зрозуміти, яка 1 професія принесе мені успіх?",
          answer: "Відповідь на питання..."
        },
        {
          question: "Це все якась ненаукова маячня",
          answer: "Відповідь на питання..."
        }
      ];

  return (
    <div className='container'>
      <Container>
        <Title>Наша відповідь на Ваші сумніви:</Title>
        {faqs.map((faq, index) => (
          <DropdownItem key={index} question={faq.question} answer={faq.answer} />
        ))}
      </Container>
    </div>
  );
};

export default FAQSection;
