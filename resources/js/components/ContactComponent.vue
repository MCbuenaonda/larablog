<template>
    <div class="card my-5 shadow">
        <div class="card-body">

            <img class="logo-100 mx-auto d-block mb-3" src="/images/logo.png" alt="">

            <form>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" v-model="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-sm-2 col-form-label">Apellido</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lastname" v-model="lastname">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" v-model="email">
                    </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control" id="comments" rows="3" v-model="comments" placeholder="Comentarios"></textarea>
                </div>

                <button type="button" class="btn btn-primary float-right mt-3 btn-lg" @click="saveContact">Enviar</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        created() { },
        data() {
            return {
                name:'',
                lastname:'',
                email: '',
                comments:''
            }
        },
        methods:{
            saveContact() {
                console.log(this.name);
                // fetch('/api/post/'+this.$route.params.id).then(res => res.json()).then((json) => {
                //     this.post = json.data
                // });
                return;
            }
        }
    }
</script>
