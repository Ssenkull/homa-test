import React from 'react';
import styled from 'styled-components';

const Section = styled.section`
  background-color: #fff;
`;

const SectionTitle = styled.h2`
  color: #000;
  text-align: left;
  font-size: 24px;
  margin-bottom: 20px; 
`;

const CardsWrapper = styled.div`
  display: flex;
  justify-content: center;
  gap: 20px; 
`;

const Card = styled.div`
  width: 100%; // ширина картки
  height: auto;
  overflow: hidden;
`;

const CardImage = styled.img`
  width: 100%;
  height: auto;
  display: block; // забезпечити, щоб зображення не мали додаткових відступів
`;

const BlogSection = () => {
  // Припустимо, що зображення вже містять весь необхідний текст і теги
  const cards = [
    {
      id: 1,
      imageUrl: '/crystal.png', // Правильні шляхи до зображень
    },
    {
      id: 2,
      imageUrl: '/yanovich.png',
    },
    {
      id: 3,
      imageUrl: '/slobozhenko.png',
    },
  ];

  return (
   <div className="container">
     <Section>
      <SectionTitle>Читайте цікаві статті у нашому блозі:</SectionTitle>
      <CardsWrapper>
        {cards.map((card) => (
          <Card key={card.id}>
            <CardImage src={card.imageUrl} alt={`Card image ${card.id}`} />
          </Card>
        ))}
      </CardsWrapper>
    </Section>
   </div>
  );
};

export default BlogSection;
