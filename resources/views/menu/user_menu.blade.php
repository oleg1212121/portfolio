<!--HEADER -->
<div class="header">
    <div class="for-sticky">
        <!--LOGO-->
        <div class="col-md-2 col-xs-6 logo">
            <a href="index.html">
                <img alt="logo" class="logo-nav" src="{{asset('images/black-logo.svg')}}">
            </a>
        </div>
        <!--/.LOGO END-->
    </div>
    <div class="menu-wrap">
        <nav class="menu">
            <div class="menu-list">
                <a data-scroll="" href="#home" class="active">
                    <span>Главная</span>
                </a>
                <a data-scroll="" href="#about">
                    <span>Обо мне</span>
                </a>
                <a data-scroll="" href="#work">
                    <span>Проекты</span>
                </a>
                <a data-scroll="" href="#services">
                    <span>Услуги</span>
                </a>
                <a data-scroll="" href="#skill">
                    <span>Навыки</span>
                </a>
                <a data-scroll="" href="#education">
                    <span>Образование</span>
                </a>
                <a data-scroll="" href="#contact">
                    <span>Контакты</span>
                </a>
                <a href="{{route('articles.index')}}">
                    <span>Новости</span>
                </a>
            </div>
        </nav>
        <button class="close-button" id="close-button">Закрыть</button>
    </div>
    <button class="menu-button" id="open-button">
        <span></span>
        <span></span>
        <span></span>
    </button>
</div>
<!--/.HEADER END-->