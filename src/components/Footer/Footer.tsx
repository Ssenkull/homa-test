import './footer.css';

const Footer = () => {
    return(
        <footer className="footer">
           <div className="container">
           <div className="footer-wrapper">
                <div className="footer-social">
                    <div className="footer-copy">© lxdmatrix.com 2023</div>
                    <div className="footer-social__items">

                    </div>
                </div>
                <div className="footer-about">
                    <ul className="about-list">
                        <li className="about-list__item">
                            Про проект
                        </li>
                        <li className="about-list__item">
                            Про метод
                        </li>
                        <li className="about-list__item">
                            Сумісність в парі
                        </li>
                        <li className="about-list__item">
                            Дитяча матриця
                        </li>
                        <li className="about-list__item">
                            Блог
                        </li>
                        <li className="about-list__item">
                            Відгуки
                        </li>
                    </ul>
                </div>
                <div className="footer-contacts">
                    <ul className="about-list">
                        <li className="about-list__item">
                            Контакти
                        </li>
                        <li className="about-list__item">
                            Тарифи
                        </li>
                        <li className="about-list__item">
                            Політика конфіденційності
                        </li>
                        <li className="about-list__item">
                            Публічна оферта
                        </li>
                    </ul>
                </div>
                <button className='footer-btn'>Розрахувати матрицю</button>
            </div>
           </div>
        </footer>
    )
}

export default Footer;