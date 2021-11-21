@extends('base')

@section('content')
    <section class="category content">
        <div class="title">
            Категории
        </div>
        <div class="category_content">
            <div class="category_content-item">
                <div class="item-line">
                    <div class="category_content-element"
                         style='background: url("/images/i1.jpg") 100% 100% no-repeat; background-size: cover;'>
                        <div class="category_content-element-title">
                            Категория 1
                        </div>
                    </div>
                    <a href="categories.html">
                        <div class="category_content-element"
                             style='background: url("/images/i1.jpg") 100% 100% no-repeat; background-size: cover;'>
                            <div class="category_content-element-title">
                                Категория 1
                            </div>
                        </div>
                    </a>

                </div>
                <div class="item-line">
                    <div class="category_content-element"
                         style='background: url("/images/i1.jpg") 100% 100% no-repeat; background-size: cover;'>
                        <div class="category_content-element-title">
                            Категория 1
                        </div>
                    </div>
                    <div class="category_content-element"
                         style='background: url("/images/i1.jpg") 100% 100% no-repeat; background-size: cover;'>
                        <div class="category_content-element-title">
                            Категория 1
                        </div>
                    </div>
                </div>
            </div>
            <div class="category_content-item">
                <div class="category_content-element-big"
                     style='background: url("/images/i1.jpg") 100% 100% no-repeat; background-size: cover;'>
                    <div class="category_content-element-title">
                        Категория 1
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="company">
        <div class="content">
            <div class="title">
                Наша компания
            </div>
            <div class="company-texts">
                <p class="company-text">
                    У нас Вы можете найти запчасти к: Снегоходам, Квадроциклам, мотоциклам, мопедам и лодочным моторам.
                    Помимо запчастей, у нас есть в ассортименте расходники: масла, фильтра, экипировка, шины, камеры, мотоаксессуары и прочие расходники.
                </p>
                <p class="company-text">
                    Вы можете позвонить в магазин по телефону, указанному на сайте. Наши специалисты проконсультируют по наличию.
                    <br>
                    Быстро ответим и поможем подобрать любую запчасть или расходник.
                </p>
                <p class="company-text">
                    Привезем под заказ любые оригинальные запчасти Suzuki, Honda, Yamaha, Kawasaki , Polaris, BRP и
                    другие.
                </p>
            </div>
            <div class="advantages">
                <div class="advantages-item">
                    <div class="item-img">
                        <img src="image/i1.jpg"
                             alt="">
                    </div>
                    <div>
                        <div>
                            Только оригинальные товары и брендовые дубликаты!
                        </div>
                    </div>
                </div>
                <div class="advantages-item">
                    <div class="item-img">
                        <img src="image/i2.png"
                             alt="">
                    </div>
                    <div>
                        Работаем без выходных!
                    </div>
                </div>
                <div class="advantages-item">
                    <div class="item-img">
                        <img src="image/i3.png"
                             alt="">
                    </div>
                    <div>
                        Выгодные цены!
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="map-block">
        <div class="text-map">
            Наш магазин находится по адресу:
        </div>
        <div class="address">
            Улица Донбасская, 23
        </div>
        <div class="photo-img">
            <img src="image/photo.jpg"
                 alt="">
        </div>

    </section>
    <div class="map-google">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2179.558780120275!2d60.56384431628662!3d56.88780798087221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c171fbf2c88257%3A0xc363b86d35b30f0b!2z0JzQvtGC0L4!5e0!3m2!1sru!2sru!4v1617354947881!5m2!1sru!2sru"
                width="100%"
                height="500"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"></iframe>
    </div>
@endsection
