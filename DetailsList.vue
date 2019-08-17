
<template>
  <table class="table table-hover user-table">
    <thead>
      <tr>
        <th>Level</th>
        <th>Semester</th>
        <th>GPA</th>
        <th>Attendence</th>
      </tr>
    </thead>
    <tbody>
      <tr v-="user in users" track-by="id">
        <td>{{user.level}}</td>
        <td>{{user.semester}}</td>
        <td>{{user.gpa}}</td>
        <td>{{user.attendence}}:-</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  data () {
    return {
      users: [
        {
          id: '1',
          level: '1G',
          semester: 'first',
          gpa: 4,
          attendence: 90
    
        },
        {
          id: '2',
          level: '1G',
          semester: 'Second',
          gpa: 4,
          attendence: 95
        },
        {
          id: '3',
          level: '2G',
          semester: 'First',
          gpa: 3.88,
          attendence: 89
        },
        {
          id: '4',
          level: '@G',
          semester: 'Second',
          gpa: 3.6,
          attendence: 90
        }
      ]
    }
  }
}
</script>