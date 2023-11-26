import { useState, ChangeEvent } from 'react';
import axios from 'axios';

import './styles/brand.css';



const BrandForm = () => {
    const [selectedSex, setSelectedSex] = useState('М');
    const [name, setName] = useState('');
    const [sex, setSex] = useState('');
    const [birthdate, setBirthdate] = useState('');
    const [matrixType, setMatrixType] = useState('Стандарт');

    const handleNameChange = (event: ChangeEvent<HTMLInputElement>) => {
        setName(event.target.value);
    };

    const handleSexChange = (selectedSex: string) => {
        setSelectedSex(selectedSex);
    };
    

    const handleBirthdateChange = (event: ChangeEvent<HTMLInputElement>) => {
        setBirthdate(event.target.value);
    };

    const handleMatrixTypeChange = (selectedMatrixType: string) => {
        setMatrixType(selectedMatrixType);
    };

    const handleCalculate = () => {
        const formData = {
            name: name,
            sex: sex === 'М' ? 1 : 0,
            date: birthdate,
            type: matrixType === 'Поглиблений' ? 1 : 0,
        };

        axios.post('http://127.0.0.1:8000/', formData)
            .then(response => {
                // Handle the API response
                console.log(response.data);
            })
            .catch(error => {
                // Handle any errors
                console.error('Error:', error);
            });
    };

    return (
        <form className='main-form'>
            <div className='name-sex'>
                <input className='name-input' type="text" placeholder="Введіть Ім'я" value={name} onChange={handleNameChange} />
                <div>
                    <button type="button" className={selectedSex === 'Ж' ? 'sex-active brand-color' : 'sex-btn'} onClick={() => handleSexChange('Ж')}>Ж</button>
                    <button type="button" className={selectedSex === 'М' ? 'sex-active brand-color' : 'sex-btn'} onClick={() => handleSexChange('М')}>М</button>
                </div>
            </div>
            <input className='birth-input' type="text" placeholder="Введіть дату народження" value={birthdate} onChange={handleBirthdateChange} />
            <button className='submit-btn brand-color'type="submit" onClick={handleCalculate}>Розрахувати</button>
                <div className='select-variant'>
                    <button className={matrixType === 'Стандарт' ? 'active default-btn brand-color' : 'default-btn'} type="button" onClick={() => handleMatrixTypeChange('Стандарт')}>Стандарт</button>
                    <button className={matrixType === 'Поглиблений' ? 'active deep-btn brand-color' : 'deep-btn'} type="button" onClick={() => handleMatrixTypeChange('Поглиблений')}>Поглиблений</button>
                </div>
        </form>
    );
};

export default BrandForm;
