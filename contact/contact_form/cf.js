Vue.use(window.vuelidate.default)
Vue.component('modal', {
	template: 
	`
		<transition name="modal">
			<div class="modal-mask">
				<div class="modal-wrapper">
					<div class="modal-container">
						<div class="modal-header">
							<p>送信確認</p>
						</div>

						<div class="modal-body">
							<p>お問い合わせを送信します。<br>よろしいですか？</p>
						</div>

						<div class="modal-footer">
							<button class="modal-button modal-success-button" type="submit">
								送信する
							</button>
							<button class="modal-button modal-secondary-button" @click="$emit('close')" type="button">
								戻る
							</button>
						</div>
					</div>
				</div>
			</div>
		</transition>
	`
})

var app = new Vue({
	el: '#app',
	//入力項目の名前
	data: {
		name: '',
		kana: '',
		tel1: '',
		tel2: '',
		tel3: '',
		email: '',
		contents: '',
		showModal: false
	},
	//入力内容をすべてクリア
	methods: {
		reset: function(){
			this.name = '';
			this.kana = '';
			this.tel1 = '';
			this.tel2 = '';
			this.tel3 = '';
			this.email = '';
			this.contents = '';
		}
	},
	//入力チェック内容
	validations: {
		name: {
			required: validators.required
		},
		kana: {
			required: validators.required
		},
		tel1: {
			required: validators.required,
			numeric: validators.numeric
		},
		tel2: {
			required: validators.required,
			numeric: validators.numeric
		},
		tel3: {
			required: validators.required,
			numeric: validators.numeric
		},
		email: {
			email: validators.email,
			required: validators.required
		},
		contents: {
			required: validators.required
		}
	}
})