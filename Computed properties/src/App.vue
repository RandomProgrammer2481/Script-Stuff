<script setup lang="ts">
import {ref, reactive, computed} from "vue"

let people = ref([
  {name: "Gordon Freeman", age: 47},
  {name: "Nathan Drake", age: 54},
  {name: "David Snake", age: 47},
  {name: "Lara Croft", age: 40},
  {name: "Leon S. Kennedy", age: 51}
])

let newName = ref()
let newAge = ref()
let children = computed(() => {
  return [...people.value.filter(p => p.age < 50)]
})
let adults = computed(() => {
  return [...people.value.filter(p => p.age > 50)]
})
let totalPeople = computed(() => {
  return people.value.length
})
let numberOfChildren = computed(() => {
  return children.value.length
})
let numberOfAdults = computed(() => {
  return adults.value.length
})

const addPerson = () => {
  let newPerson = {name: String(newName), age: Number(newAge)}
  
  people.value.push(newPerson)
}

</script>

<template>
  <body>
    <div>
        
       <h3>Name</h3> 
       <input v-model="newName">
      
       <h3>Age</h3>
       <input v-model.number="newAge">
    
    </div>
    
    <button @click="addPerson">Add Person</button>
    
    <div style="text-align: center;">
      <h3>Children List ({{ numberOfChildren }})</h3>
      <ul>
        <li v-for="(child, index) in children" :key="index">
        {{ child.name}},
        {{ child.age }}
        </li>
      </ul>
    
      <h3>Adults List ({{ numberOfAdults }})</h3>
      <ul>
        <li v-for="(adult, index) in adults" :key="index">
        {{ adult.name}},
        {{ adult.age }}
        </li>
      </ul>

      <h3>Full List ({{ totalPeople }})</h3>
      <ul>
        <li v-for="(person, index) in people" :key="index">
          {{ person.name}},
          {{ person.age }}
        </li>
      </ul>
    </div>
  </body>
</template>
