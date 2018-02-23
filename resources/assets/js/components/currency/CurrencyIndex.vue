
<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createCurrency'}" class="btn btn-success">Create new Currency</router-link>
	    <router-link :to="{name: 'currencyConversion'}" class="btn btn-success">Converison Currency</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Currency list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>                        
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="currency, index in currencies">
                        <td>{{ currency.name }}</td>
                        <td>{{ currency.amount }}</td>
                        
                        <td>
                            <router-link :to="{name: 'editCurrency', params: {id: currency.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(currency.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                currencies: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/currency')
                .then(function (resp) {
                    app.currencies = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load currency");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/currency/' + id)
                        .then(function (resp) {
                            app.currencies.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete currency");
                        });
                }
            }
        }
    }
</script>

