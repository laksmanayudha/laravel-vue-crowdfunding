export const UserComponent = {
    template: `
    <div class="usersList">
        <ul>
            <li v-for="(user , index) in datas" :key="index">
                {{ user.name }} ||
                <button @click="$emit('update', index)">Edit</button>
                <button @click="remove(index)">Delete</button>
            </li>
        </ul>
    </div>
    `,
    props: ['datas', 'remove']
}