import './mobile.css';
import mobile from '../../../public/mobile.png';

const MobileBlock = () => {
    return(
        <div className="mobile">
            <div className="mobile-wrapper">
            <img className='mobile-img' src="/mobile.png" alt="Mobile" />
                <div className="mobile-text">
                    <h2 className="mobile-title">
                        L&S Matrix дарують трактування матриць кожного місяця!
                    </h2>
                    <p className="mobile-text__item">
                        Наш профіль у Instagram постійно активний на публікації та дуже змістовний на корисну інформацію про матрицю, тому ми запрошуємо тебе стати частиною нашого ком'юніті L&S Matrix та щомісяця мати можливість виграти безкоштовний доступ до розбору нашого проекту!
                    </p>
                    <div className="mobile-social">
                        <h3 className="mobile-social__title">
                            Підпишись на наші соціальні мережі:
                        </h3>
                        <div className="mobile-social__items">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default MobileBlock