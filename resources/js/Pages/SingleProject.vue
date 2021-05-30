<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Single Project
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"></div>
        {{ project.name }}
        {{ department[0].name }}
        <!-- <img :src="'/storage/' + project.image" alt="" sizes="100%" srcset="" /> -->
        <main @click.prevent="point">
          <img sizes="100%" :src="'/storage/' + project.image" />
          <!--             @click="toggleModel = !toggleModel" -->
          <div
            :style="{ top: this.mystyle.offsetY, left: this.mystyle.offsetX }"
            class="container"
            v-if="toggleModel"
          >
            <div
              :style="{ backgroundColor: this.mystyle.backgroundColor }"
              class="box red"
            ></div>
            <div class="box green"><i class="fas fa-map-marker-alt"></i></div>
          </div>
          <div
            v-for="(assignee,index) in assignee" :key="index"
            :style="{ top: assignee.top, left: assignee.left }"
            class="container"
          >
            <div
              :style="{ backgroundColor: assignee.status_of_task.color }"
              class="box red"
            ></div>
            <div class="box green"><i class="fas fa-map-marker-alt"></i></div>
          </div>
        </main>
        <!-- model -->
        <div v-if="toggleModel" class="absolute z-30 inset-0 z-0">
          <div
            class="fixed overflow-x-hidden overflow-y-auto inset-0 flex justify-center items-center z-50"
            v-if="toggleModel"
          >
            <div class="relative mx-auto w-auto max-w-2xl">
              <div class="bg-gray-300 w-full">
                <span class="justify-center items-center">Assignee</span>
                <form
                  @submit.prevent="
                    submit(
                      this.mystyle.offsetX,
                      this.mystyle.offsetY,
                      project.image,
                      this.idOfPage
                    )
                  "
                >
                  <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 sm:p-6">
                      <div class="grid grid-cols-6 gap-6">
                        <!-- This is an example component -->
                        <div class="col-span-6 sm:col-span-3">
                          <label
                            for="department_id"
                            class="block text-sm font-medium text-gray-700"
                            >Form</label
                          >
                          <select
                            name="department_id"
                            id="department_id"
                            class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none"
                            v-model="form.department_id"
                          >
                            <option>Choose a color</option>
                            <option
                              v-for="(departmentV, index) in department"
                              :key="index"
                              :value="departmentV.id"
                            >
                              {{ departmentV.name }}
                            </option>
                          </select>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                          <label
                            for="first_name"
                            class="block text-sm font-medium text-gray-700"
                            >layer</label
                          >
                          <input
                            type="text"
                            name="image"
                            id="layer"
                            disabled
                            :value="project.image"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                          />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                          <label
                            for="name"
                            class="block text-sm font-medium text-gray-700"
                            >Titel</label
                          >
                          <input
                            type="text"
                            name="name"
                            id="name"
                            v-model="form.name"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                          />
                        </div>
                        <!-- This is an example component -->
                        <div class="col-span-2 sm:col-span-2">
                          <label
                            for="status"
                            class="block text-sm font-medium text-gray-700"
                            >Status</label
                          >
                          <select
                            v-model="form.status_id"
                            name="status"
                            id="status"
                            class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none"
                          >
                            <option
                              v-for="(status, index) in status"
                              :key="index"
                              :value="status.id"
                            >
                              {{ status.name }}
                            </option>
                          </select>
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                          <label
                            for="priority"
                            class="block text-sm font-medium text-gray-700"
                            >Priority</label
                          >
                          <select
                            v-model="form.priority_id"
                            name="priority"
                            id="priority"
                            class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none"
                          >
                            <option
                              v-for="(priority, index) in priority"
                              :key="index"
                              :value="priority.id"
                            >
                              {{ priority.name }}
                            </option>
                          </select>
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                          <label
                            for="user_id"
                            class="block text-sm font-medium text-gray-700"
                            >Assignee</label
                          >
                          <select
                            v-model="form.user_id"
                            name="user_id"
                            id="user_id"
                            class="border border-gray-300 rounded-full text-gray-600 h-10 pl-2 pr-5 bg-white hover:border-gray-400 focus:outline-none appearance-none"
                          >
                            <option
                              v-for="(user, index) in users"
                              :key="index"
                              :value="user.id"
                            >
                              {{ user.name }}
                            </option>
                          </select>
                        </div>
                        <div class="col-span-3 sm:col-span-2">
                          <label
                            for="date"
                            class="block text-sm font-medium text-gray-700"
                            >Deu date</label
                          >
                          <input
                            type="date"
                            name="date"
                            id="date"
                            v-model="form.date"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                          />
                        </div>
                        <div class="col-span-full sm:col-span-full">
                          <div class="flex items-center justify-between">
                            <div>
                              <span
                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200"
                              >
                                Task in progress
                              </span>
                            </div>
                            <div class="text-right">
                              <span
                                class="text-xs font-semibold inline-block text-pink-600"
                              >
                                {{ progress }}
                              </span>
                            </div>
                          </div>
                          <div
                            class="overflow-hidden h-2 text-xs flex rounded bg-pink-200"
                          >
                            <div
                              :style="{ width: progress }"
                              class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-pink-500"
                            ></div>
                          </div>
                        </div>
                        <!-- {{ $page.props.user.id }} -->
                      </div>
                    </div>
                    <hr />
                    <div class="px-4 text-right sm:px-6">
                      <button
                        type="submit"
                        class="inline-flex justify-center px-4 py-1 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                      >
                        Save
                      </button>
                      <button
                        @click="toggleModel = false"
                        class="rounded bg-red-800 text-white px-4 py-1"
                      >
                        Close
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- model -->
      </div>
    </div>
  </app-layout>
</template>
<style>
html {
  font-size: 20px;
}
main {
  margin: 3rem;
  border: 1px solid #333;
  position: relative;
}
.container {
  position: absolute;
}
.box {
  position: absolute;
  width: 0px;
}
.red {
  z-index: 0;
  width: 9px;
  height: 8px;
  top: 5px;
  left: 3px;
}
</style>

<script>
import AppLayout from "@/Layouts/AppLayout";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { pickBy, throttle } from "lodash";

export default {
  // props:['Category'],
  components: {
    AppLayout,
  },
  data() {
    return {
      mystyle: {
        backgroundColor: "#f0f",
        offsetX: 0,
        offsetY: 0,
      },
      toggleModel: false,
      idOfPage: window.location.href.split("/").pop(),
    };
  },
  props: {
    project: Object,
    department: Object,
    progress: Object,
    priority: Object,
    status: Object,
    users: Object,
    assignee: Object,
  },
  methods: {
    point: function (ev) {
      this.mystyle.backgroundColor = "#f9d";
      this.toggleModel = true;
      console.log("fo", this.form);
      this.mystyle.offsetX = ev.offsetX - 7 + "px";
      this.mystyle.offsetY = ev.offsetY - 22 + "px";
    },
  },
  setup() {
    const form = reactive({
      name: null,
      department_id: null,
      user_id: null,
      top: null,
      left: null,
      image: null,
      status_id: null,
      priority_id: null,
      date: null,
      project_id: null,
    });

    function submit(left, top, image, idOfPage) {
      form.left = left;
      form.top = top;
      form.image = image;
      form.project_id = Number(idOfPage);
      console.log("form", form);
      Inertia.post("/assignee-task/", form);
    }
    return { form, submit };
  },
};
// document.addEventListener("DOMContentLoaded", () => {
//   document.querySelector("main").addEventListener("click", (ev) => {
//     var container = document.querySelector(".container");
//     document.querySelector(".red").style.background = "#f9d";
//     container.style.left = ev.offsetX - 7 + "px";
//     container.style.top = ev.offsetY - 21 + "px";
//   });
// });
</script>
