import {useState, useEffect} from "react";
import './mainform.css';

import BigLogo from '../../img/big-logo.png';
import FirstComponent from "./FirstComponent";
import ChildForm from './ChildForm';
import BrandForm from './BrandForm';
import RelationForm from './RealationForm';


const MainForm = () => {
    const[variant, setVariant] = useState(1);
    const [activeButton, setActiveButton] = useState(0)
    const [component, setComponent]= useState(<></>)

    useEffect(()=>{
            if(variant === 1){
               setComponent(
                <FirstComponent/>
               )
            } else if(variant === 2){
                setComponent(
                    <RelationForm/>
                   )
            }else if(variant === 3){
                setComponent(
                    <ChildForm/>
                   )
            }else if(variant === 4){
                setComponent(
                    <BrandForm/>
                   )
            }

    },[variant])

    return (
        <>
            <div className="container">
    <img src={BigLogo} alt="big logo" />
    <div className="variants">
        <button 
            className={`variants-btn ${variant === 1 ? "active main-color" : ""}`} 
            onClick={() => setVariant(1)}
        >
            Матриця
        </button>
        <button 
            className={`variants-btn ${variant === 2 ? "active" : ""}`} 
            onClick={() => setVariant(2)}
        >
            Сумісність в парі
        </button>
        <button 
            className={`variants-btn ${variant === 3 ? "active child-color" : ""}`} 
            onClick={() => setVariant(3)}
        >
            Дитяча
        </button>
        <button 
            className={`variants-btn ${variant === 4 ? "active brand-color" : ""}`} 
            onClick={() => setVariant(4)}
        >
            Матриця особистого бренду
        </button>
    </div>
    {component}
</div>

           
        </>

    )

}

export default MainForm;