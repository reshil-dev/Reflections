<template>
    <div>
        <h4 class="text-center">Get Task</h4>
         <div class="row">
            <div class="col-md-6">
            <form @submit.prevent="getTask" @keydown="form.errors.clear($event.target.name)">
                <div class="field">
                    <label class="label">Time left Today</label>
                    <div class="control">
                        <input class="input" name="time_today" type="text" placeholder="Time left Today" v-model="form.time_today" />
                    </div>
                    <span v-if="form.errors.has('time_today')" class="has-text-danger text-xs mt-2" v-text="form.errors.get('time_today')"></span>
                </div>

                <div class="field">
                    <label class="label">Time For Tomorrow</label>
                    <div class="control">
                         <input class="input" name="time_tmr" type="text" placeholder="Time For Tomorrow" v-model="form.time_tmr" />
                    </div>
                    <span class="has-text-danger text-xs mt-2" v-text="form.errors.get('time_tmr')"></span>
                </div>
                <div class="field">
                    <label class="label">Set Date</label>
                    <div class="control">
                         <input class="input" name="today" type="text" placeholder="Time For Tomorrow" v-model="form.today" />
                    </div>
                    <span class="has-text-danger text-xs mt-2" v-text="form.errors.get('today')"></span>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" :disabled="form.errors.any()">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <hr/>
        <div v-if="show">
            <h4 class="text-center">Priority Tasks</h4>
            <br />
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Priority</th>
                    <th>Estimation</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ task.id }}</td>
                    <td>{{ task.title }}</td>
                    <td>{{ task.description }}</td>
                    <td>{{ task.status }}</td>
                    <td>{{ task.due_date }}</td>
                    <td>{{ task.priority }}</td>
                    <td>{{ task.estimate }}</td>
                </tr>
                </tbody>
            </table>
            </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: new Form({
                time_today: '',
                time_tmr: '',
                today: '',
            }),
            task: {},
            show: false,
        }
    },
    methods: {
        getTask() {
            this.form.post('/tasks/priority')
            .then(response => {
                this.task = response.data;
                this.show = true;
            })
            .catch(error => console.log(error))
        }
    }
}
</script>
