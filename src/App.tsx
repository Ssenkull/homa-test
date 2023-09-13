import React from 'react';
import Header from './components/Header/Header';
import MainForm from './components/MainForm/MainForm';
import axios, { AxiosResponse } from 'axios';

import './App.css';
import Stat from './components/main-statisctics';
import AboutMatrix from './components/AboutMatrix';
import Uniq from './components/uniq';
import Footer from './components/Footer/Footer';
import MobileBlock from './components/Mobile/Mobile';
import FreeBlock from './components/FreeCalcBlock/FreeBlock';
import MainCard from './components/cards/MainCard';
import ApiComponent from './components/apiTest/Api';

// import logo from './img/logo.svg';

const App: React.FC = () => {
  return (
    <div className="App">
      <Header links={['Матриці', 'Матеріали', 'Тарифи', 'Відгуки', 'Блог']}/>
      <ApiComponent/>
      <MainForm />
      <Stat/>
      <AboutMatrix/>
      <FreeBlock/>
      <Uniq/>
      <MainCard/>
      <MobileBlock/>
      <Footer/>
    </div>
  );
}

export default App;



interface MatrixInfo {
  name: string;
  sex: boolean;
  date: string;
  type: boolean;
}

// const fetchData = async () => {
//   try {
//     // const response: AxiosResponse<MatrixInfo[]> = await axios.get<MatrixInfo[]>('http://127.0.0.1:8000/');
//     const data: MatrixInfo[] = response.data;

   
//     data.forEach((item: MatrixInfo) => {
//       const sex = item.sex ? 'Male' : 'Female';
//       const type = item.type ? 'Base' : 'Exstend';
//       console.log('Name:', item.name);
//       console.log('Sex:', sex);
//       console.log('Date:', item.date);
//       console.log('Type:', type);
//     });
//   } catch (error) {
//     console.error('Error:', error);
//   }
// };


// fetchData();
