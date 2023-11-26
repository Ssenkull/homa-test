import React from 'react';
import styled from 'styled-components';

const Container = styled.div`
  display: flex;
  flex-direction: column;
  align-items: center;
  font-family: Arial, sans-serif;
  width: 100%;
`;

const HeaderContainer = styled.div`
  width: 100%;
  margin-top: 20px;
  padding-left: 20px; /* Adjust as necessary for your layout */
`;

const Title = styled.h1`
  color: #ff4400;
  margin-top: 20px;
  font-size: 38px;
  text-align: left;
  margin-bottom: 10px;
`;

const SubtitleContainer = styled.div`
  display: flex;
  justify-content: flex-start;
  align-items: center;
  margin-bottom: 10px; /* Spacing between this subtitle and anything below */
`;

const Subtitle = styled.span`
  font-size: 16px;
  color: #333;
  text-align: left;
  margin-right: 155px;
`;

const ImageContainer = styled.div`
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  width: 100%;
  margin: 20px 0;
`;

const StyledImage = styled.img`
  width: 45%; /* Adjust based on your layout */
  height: auto;
`;
const StyledImageHealth = styled.img`
  width: 25%; /* Adjust based on your layout */
  height: 10%;
`;

const LegendContainer = styled.div`
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 20px;
`;

const LegendItem = styled.div`
  display: flex;
  align-items: center;
`;

const ColorBox = styled.div`
  width: 20px;
  height: 20px;
  background-color: ${(props) => props.color};
  margin-right: 8px;
`;

const LegendText = styled.span`
  font-size: 14px;
`;

const SelectorsContainer = styled.div`
  display: flex;
  justify-content: space-around;
  width: 100%;
  padding: 20px 0;
`;

const SelectorGroup = styled.div`
  display: flex;
  flex-direction: column;
  align-items: center;
`;

const SelectorTitle = styled.div`
  margin-bottom: 10px;
  font-size: 16px;
`;

const Selector = styled.div`
  display: flex;
  gap: 10px;
`;

const Circle = styled.div`
  width: 24px;
  height: 24px;
  border-radius: 50%;
  background-color: #ccc;
  border: 2px solid transparent;

  &:hover {
    border-color: blue;
  }
`;

const ActiveCircle = styled(Circle)`
  background-color: blue;
`;

const MyComponent = () => {
  return (
   <div className="container">
     <Container>
      <HeaderContainer>
        <Title>Персональний розбір</Title>
        <SubtitleContainer>
          <Subtitle>Дата народження: </Subtitle> {/* Replace [дата] with actual data */}
          <Subtitle>Вік: </Subtitle> {/* Replace [вік] with actual data */}
        </SubtitleContainer>
      </HeaderContainer>
      <ImageContainer>
        <StyledImageHealth src='./health.png' alt="Health Chart" />
        <StyledImage src='./matrix.png' alt="Matrix Chart" />
      </ImageContainer>
      <LegendContainer>
        {/* Repeat this LegendItem for each legend entry */}
        <LegendItem>
          <ColorBox color="#7C4DFF" />
          <LegendText>Назва карти</LegendText>
        </LegendItem>
        {/* Add more LegendItems as per your legend entries */}
      </LegendContainer>
      <SelectorsContainer>
        {/* Repeat this SelectorGroup for each selector group */}
        <SelectorGroup>
          <SelectorTitle>Пошук себе:</SelectorTitle>
          <Selector>
            <Circle />
            <ActiveCircle />
          </Selector>
        </SelectorGroup>
        {/* Add more SelectorGroups as per your selector categories */}
      </SelectorsContainer>
    </Container>
   </div>
  );
};

export default MyComponent;
