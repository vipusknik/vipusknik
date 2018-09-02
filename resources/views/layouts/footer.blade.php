<div class="bg-blue-darker">
    <div class="container mx-auto py-5">
        <div class="flex text-white">
            <div class="w-1/3 flex flex-col items-center border-r border-white">
                <div class="text-lg">Воспользуйтесь <a href="#" @click="$modal.show('feedback-modal')" class="text-orange no-underline">обратной связью</a></div>
                <div class="text-lg">или напишите нам:</div>
                <a href="mailto:vipusknik@gmail.com" class="block text-lg text-white no-underline mb-auto">vipusknik@gmail.com</a>
                <a href="/" class="block text-xl text-orange no-underline">На главную</a>
            </div>

            <div class="w-2/3 flex flex-col items-center">
                <div>Все логотипы и торговые марки на сайте являются собственностью их владельцев.</div>
                <div class="mb-1">Все права защищены © ИПФ "Артекс" 2018 г.</div>
                <div class="mb-auto">Выпускник - информационно-обучающий портал для абитуриентов.</div>
                <a href="/" class="block p-3">
                    <img src="/img/vipusknik_logo.png" alt="" class="block w-48">
                </a>
            </div>
        </div>
    </div>

    <modal name="feedback-modal" height="auto" :width="425">
        <div class="relative bg-blue-darker p-2">
            <button class="absolute pin-t mt-4 pin-l ml-4" @click="$modal.hide('feedback-modal')">
                <svg class="inline-block w-3 h-3 fill-current text-grey hover:text-black" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/></svg>
            </button>

            <div class="flex flex-col items-center border border-white pt-4 pb-3 px-4">
                <div class="mb-6 mt-3">
                    <img src="/img/vipusknik_logo.png" alt="" class="block w-48">
                </div>

                <div class="text-lg text-grey text-center font-bold tracking-wide leading-none mb-4">
                    <div>Если вы хотите разместить рекламу </div>
                    <div>или нашли ошибку на сайте заполните </div>
                    <div>форму внизу</div>
                </div>

                <div class="w-full mb-6 px-10">
                   <div class="mb-4">
                        <input type="text" placeholder="Ваше имя" class="block w-full rounded-sm p-3 text-grey-dark">
                    </div>
                   <div class="mb-4">
                        <input type="text" placeholder="Email или номер телефона" class="block w-full rounded-sm p-3 text-grey-dark">
                    </div>
                    <div>
                        <textarea class="block w-full h-48 rounded-sm p-3 text-grey-dark" placeholder="Опишите цель запроса"></textarea>
                    </div>
                </div>

                <div>
                    <button type="button" class="block rounded-sm text-lg tracking-wide leading-none px-12 py-3 uppercase bg-orange hover:bg-green text-white">Отправить</button>
                </div>
            </div>
        </div>
    </modal>
</div>
