<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    starter: 'feu',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>
            <p class="flex justify-items mt-4 justify-evenly text-white text-xl font-bold"> Choose your starter</p>
            <div class="flex h-32 mt-4 justify-evenly justify-items text-white">
                <div class="border rounded-full  bg-violet-200 hover:bg-violet-300 flex h-32">
                    <label for="feu">
                        <input type="radio" id="feu" name="starter" value="feu" class="hidden" v-model="form.starter" required >
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/155.png" alt="pokemon" class="cursor-pointer h-32"/>
                        <figcaption class="flex justify-center">Fire</figcaption>
                    </label>
                </div>
                <div class="border rounded-full  bg-violet-200 hover:bg-violet-600 flex h-32">
                    <label for="plante">
                        <input type="radio" id="plante" name="starter" value="plante" class="hidden" v-model="form.starter" required>
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/906.png" alt="pokemon" class="cursor-pointer h-32"/>
                       <figcaption class="flex justify-center">Grass</figcaption>
                    </label>
                </div>
                <div class="border rounded-full bg-violet-200 hover:bg-violet-600 flex h-32">
                    <label for="eau">
                        <input type="radio" id="eau" name="starter" value="eau" class="hidden" v-model="form.starter" required>
                        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/501.png" alt="pokemon" class="cursor-pointer h-32"/>
                        <figcaption class="flex justify-center">Water</figcaption>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-end mt-8">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Already registered?
                </Link>

                

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
