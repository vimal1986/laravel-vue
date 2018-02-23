
<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.currencyId = id;
            axios.get('/api/v1/currency/' + id)
                .then(function (resp) {
                    app.currency = resp.data;
                })
                .catch(function () {
                    alert("Could not load your currency")
                });
        },
        data: function () {
            return {
                currencyId: null,
                currency: {
                    name: '',
                    amount: ''
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCurrency = app.currency;
                axios.patch('/api/v1/currency/' + app.currencyId, newCurrency)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your currency");
                    });
            }
        }
    }
</script>

