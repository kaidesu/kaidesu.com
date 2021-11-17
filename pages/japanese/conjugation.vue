<template>
    <div>
        Japanese conjugation practice

        <div>{{ question }}</div>
        <form @submit.prevent="submit">
            <!-- <Input /> -->
            <input v-model="input">
        </form>

        <b v-if="isCorrect === true">Correct!</b>
        <b v-if="isCorrect === false">Incorrect!</b>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                question: '',
                answer: '',
                input: '',
                isCorrect: null,
                verbs: {
                    masu: [
                        {
                            question: 'する',
                            answer: 'します'
                        },
                        {
                            question: 'たべる',
                            answer: 'たべます'
                        },
                        {
                            question: 'のむ',
                            answer: 'のみます'
                        },
                        {
                            question: 'ねる',
                            answer: 'ねます'
                        },
                        {
                            question: 'くる',
                            answer: 'きます'
                        },
                        {
                            question: 'はなす',
                            answer: 'はなします'
                        },
                        {
                            question: 'いく',
                            answer: 'いきます'
                        },
                        {
                            question: 'きく',
                            answer: 'ききます'
                        },
                        {
                            question: 'かえる',
                            answer: 'かえります'
                        },
                        {
                            question: 'よむ',
                            answer: 'よみます'
                        },
                        {
                            question: 'おきる',
                            answer: 'おきます'
                        },
                        {
                            question: 'みる',
                            answer: 'みます'
                        },
                        {
                            question: 'べんきょうする',
                            answer: 'べんきょうします'
                        }
                    ]
                }
            }
        },

        methods: {
            getNewQuestion() {
                const verb = this.verbs.masu[Math.floor(Math.random() * this.verbs.masu.length)]

                this.question = verb.question
                this.answer = verb.answer
            },

            submit() {
                if (this.input == this.answer) {
                    this.isCorrect = true
                } else {
                    this.isCorrect = false
                }

                this.input = ''
                this.getNewQuestion()
            }
        },

        mounted() {
            this.getNewQuestion()
        }
    }
</script>
