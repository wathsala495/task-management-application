<template>
  <div>
    <h1>Task List</h1>

    <!-- Display the list of tasks -->
    <ul>
      <li v-for="task in tasks" :key="task.id">
        <div>
          <strong>{{ task.title }}</strong>
          <p>{{ task.description }}</p>
          <span>{{ task.completed ? 'Completed' : 'Not Completed' }}</span>
          <button @click="editTask(task)">Edit</button>
          <button @click="deleteTask(task.id)">Delete</button>
        </div>
      </li>
    </ul>

    <!-- create a new task -->
    <form @submit.prevent="createTask">
      <input v-model="newTask.title" placeholder="Title" required />
      <textarea v-model="newTask.description" placeholder="Description"></textarea>
      <button type="submit">Create Task</button>
    </form>

    <!-- edit a task -->
    <div v-if="editingTask">
      <input v-model="editingTask.title" />
      <textarea v-model="editingTask.description"></textarea>
      <button @click="updateTask(editingTask)">Update Task</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tasks: [],
      newTask: {
        title: '',
        description: '',
      },
      editingTask: null,
    };
  },
  created() {
    this.fetchTasks();
  },
  methods: {
    fetchTasks() {
      axios.get('http://localhost:8000/api/tasks')
        .then(response => {
          this.tasks = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    createTask() {
      axios.post('http://localhost:8000/api/tasks', this.newTask)
        .then(response => {
          this.tasks.push(response.data);
          this.newTask = { title: '', description: '' }; // Clear the form
        })
        .catch(error => {
          console.error(error);
        });
    },
    deleteTask(id) {
      axios.delete(`http://localhost:8000/api/tasks/${id}`)
        .then(() => {
          this.fetchTasks();
        })
        .catch(error => {
          console.error(error);
        });
    },
    
    editTask(task) {
      this.editingTask = { ...task }; 
    },
    updateTask(task) {
      axios.put(`http://localhost:8000/api/tasks/${task.id}`, task)
        .then(() => {
          this.fetchTasks();
          this.editingTask = null; 
        })
        .catch(error => {
          console.error(error);
        });
    },
  },
};
</script>
