<div class="lg:bg-grey-light">
    <div class="container mx-auto bg-blue-darker py-5">
        <div class="flex text-white">
            <div class="w-1/3 flex flex-col items-center border-r border-white">
                <div class="text-lg">Воспользуйтесь <a href="#" @click="$modal.show('feedback-modal')" class="text-orange no-underline">обратной связью</a></div>
                <div class="text-lg">или напишите нам:</div>
                <a href="mailto:vipusknik@gmail.com" class="block text-lg text-white no-underline mb-auto">vipusknik@gmail.com</a>
                <a href="/" class="block text-xl text-orange no-underline">На главную</a>
            </div>

            <div class="w-2/3 flex flex-col items-center">
                <div>Все логотипы и торговые марки на сайте являются собственностью их владельцев.</div>
                <div class="mb-1">Все права защищены © ИПФ "Артекс" {{ Carbon\Carbon::now()->year }} г.</div>
                <div class="mb-auto">Выпускник - информационно-обучающий портал для абитуриентов.</div>
                <a href="/" class="block p-3">
                    <img src="/img/vipusknik_logo.png" alt="" class="block w-48">
                </a>
            </div>
        </div>
    </div>
</div>
