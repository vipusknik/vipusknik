<modal name="feedback-modal" height="auto" :width="425" :adaptive="true">
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

            <form @submit.prevent="onFeedbackSubmit" class="w-full">
                <div class="w-full mb-6 px-10">
                   <div class="mb-4">
                        <input type="text" v-model="feedback.sender_name" placeholder="Ваше имя" required class="block w-full rounded-sm p-3 text-grey-dark">
                    </div>
                   <div class="mb-4">
                        <input type="text" v-model="feedback.sender_mail_or_phone" placeholder="Email или номер телефона" required class="block w-full rounded-sm p-3 text-grey-dark">
                    </div>
                    <div>
                        <textarea v-model="feedback.body" placeholder="Опишите цель запроса" required class="block w-full h-48 rounded-sm p-3 text-grey-dark"></textarea>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit"
                            v-text="sendingFeedback ? 'Отправка' : 'Отправить'"
                           :disabled="sendingFeedback"
                           class="rounded-sm text-lg tracking-wide leading-none px-12 py-3 uppercase bg-orange hover:bg-green text-white">
                    </button>
                </div>
            </form>
        </div>
    </div>
</modal>
