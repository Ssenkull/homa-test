import { useState } from 'react';
import './styles/mainCard.css';


const MainCard = () => {
     const [matrixType, setMatrixType] = useState('');

    const handleMatrixTypeChange = (selectedMatrixType: string) => {
        setMatrixType(selectedMatrixType);
    };
    return(
        <div className="card-container">
           <div className="container">
           <div className="card-inner">
                    <h2 className='card-title'>Індивідуальний розбір <br /> матриці долі</h2>
                    <div className='select-variant select-card'>
                        <button className={matrixType === 'Стандарт' ? 'active default-btn main-color ' : 'default-btn card-btn'} type="button" onClick={() => handleMatrixTypeChange('Стандарт')}>Стандарт</button>
                        <button className={matrixType === 'Поглиблений' ? 'active deep-btn main-color ' : 'deep-btn card-btn'} type="button" onClick={() => handleMatrixTypeChange('Поглиблений')}>Поглиблений</button>
                    </div>
                    <div className="card-text">
                        <h3>
                            Усі трактування з тарифу "Стандарт", а також:
                        </h3>
                        <p>Опис дитячих сценарїів, як вони впливають на Ваше життя зараз і як пропрацювати їх.</p>
                        <p>Трактування особливостей в усіх періодів в матриці</p>
                        <p>Практики від психологів для пропрацювання основних позицій в матриці, які принесить можливість отримати реальну користь від розбору та запустити початок змін у житті.</p>
                    </div>

                    <button className='open-btn main-color'type="submit">Відкрити калькулятор</button>
            </div>
           </div>
        </div>
    )
}

export default MainCard;