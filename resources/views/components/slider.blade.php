{{-- <div>
    <img src="{{ asset('img/1.jpg') }}" alt="">
</div> --}}
<div class="slider">
    <div class="slide current">
        <div class="content">
            <div class="slider__heading">Группа компаний «ДИВА»</div>
            <div class="slider__desc">
                Выращивание кочанных салатов и листовых овощей. Услуги интегрированной логистики для розничных сетей и
                предприятий общественного питания.
            </div>
            <div class="slider__logo">
                <img src="{{ asset('img/s3.svg') }}" alt="">
                <img src="{{ asset('img/s2.svg') }}" alt="">
                <img src="{{ asset('img/s4.svg') }}" alt="">
            </div>
        </div>
    </div>
    <div class="slide">
        <div class="content">
            <p class="slider__heading">2. Nature Water</p>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit hic
                maxime, voluptatibus labore doloremque vero!
            </p>
        </div>
    </div>
    <div class="slide">
        <div class="content">
            <p class="slider__heading">3. Nature Mountain</p>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit hic
                maxime, voluptatibus labore doloremque vero!
            </p>

        </div>
    </div>

</div>
<div class="buttons">
    <button id="prev"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg></button>
    <button id="next"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg></button>
</div>
