<template>
    <div></div>
</template>
<script>
export default {
    data() {
        return {
            form: {
                email: "",
                password: "",
            },
            errors: [],
        };
    },
    methods: {
        loginUser() {
            axios
                .post("/api/login", this.form)
                .then((response) => {
                    console.log(response.data);
                    //this.$router.push({ name: "Dashboard" });
                    document.location.href = "/Dashboard";
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                });
        },
    },
};
</script>
