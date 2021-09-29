<template>
  <div>
    <h4 class="text-center">All Tasks</h4>
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
        <tr v-for="task in tasks" :key="task.id">
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
</template>

<script>
export default {
    data() {
        return {
            tasks: {},
        }
    },
    created() {
        axios.get('tasks')
            .then(response => {
                this.tasks = response.data.data;

            })
            .catch(error => console.log(error))
    },
    methods: {
    }
};
</script>
