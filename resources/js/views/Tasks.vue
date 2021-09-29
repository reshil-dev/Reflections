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
          <th>Created At</th>
          <th>Updated At</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in tasks" :key="task.id">
          <td>{{ task.id }}</td>
          <td>{{ task.title }}</td>
          <td>{{ task.description }}</td>
          <td>{{ task.created_at }}</td>
          <td>{{ task.updated_at }}</td>
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
