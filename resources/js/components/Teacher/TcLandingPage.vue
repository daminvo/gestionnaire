<template>
    <div    class="teacher">
        <div class="container">
            <div class="welcome">
                <h1><span>Welcome Mr</span> {{ user.prenom }}</h1>
                <p>Welcome to your page, here you can check your student's information and manage their absences.
                    Let's get started
                </p>
                <button class="get-started" @click="goToDashboard">Get started</button>
            </div>
            <div class="container-img">
                <img src="../../assets/teacher.png" alt="">
            </div>
        </div>
    </div>
</template>


<script>

export default {
    data() {
        return {
            userId: this.$route.params.id,
            user: {
                nom:'',
                prenom: '',
            }
        }
    },


    methods:{

        goToDashboard() {
            this.$router.push('/teacher=' + this.userId + '/dashboard/home')
        }
    },

    mounted() {
        axios
            .post('http://localhost:8000/api/TeacherInfo', {id:this.$route.params.id})
            .then( res => {
                console.log(res.data)
                this.user.nom = res.data[0].Nom_Ens
                this.user.prenom = res.data[0].Prenom_Ens
            })
    },
}
</script>


<style scoped>
.teacher {
    background: url('../../assets/teacher-background.jpg') no-repeat center;
    background-size: cover;
    height: 100vh;
    width: 100%;
    position: fixed;
}

.container{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    flex-wrap: wrap;
    width: 100%;
    height: 100vh;
}

.welcome {
    height: 100%;
    min-width: 300px;
    width: 30%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: flex-start;
    color: #fff;
}

.welcome h1 {
    font-size: 90px;
    position: relative;
    margin-top: auto;
}
.welcome span{
    font-weight: 400;
    font-size: 50px;
    margin-top: -38px;
    position: absolute;
}

.welcome p{
    margin-bottom: auto;
    font-size: 20px;
}

.get-started{
    margin-left: 20px;
    width: 200px;
    margin-top: -110px;
    height: 50px;
    margin-bottom: auto;
    font-size: 20px;
    font-weight: 700;
    background: linear-gradient(-90deg, #2c4eb477, #00882982);
    border: 1px solid;
    border-radius: 30px;
    color: #fff;
    box-shadow: 5px 5px 10px rgb(0 0 0 / 48%);
    transition: all ease .7s;
}

.get-started:hover {
  box-shadow: none;
  border: 1px solid #ffffff83;
  background: rgb(44,78, 180);
  transition: all ease .5s;
}


.container-img {
    min-width: 300px;
    width: 45%;
    height: 100%;
}

.container-img img {
    width: auto;
    height: 100%;
}
</style>
