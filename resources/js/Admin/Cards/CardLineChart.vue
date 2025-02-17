<template>
  <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-black">
    <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
      <div class="flex flex-wrap items-center">
        <div class="relative w-full max-w-full flex-grow flex-1">
          <h6 class="uppercase text-white mb-1 text-xs font-semibold">
            Overview
          </h6>
          <h2 class="text-white text-xl font-semibold">
            Sales value
          </h2>
        </div>
      </div>
    </div>
    <div class="p-4 flex-auto">
      <!-- Chart -->
      <div class="relative h-350-px">
        <canvas id="line-chart"></canvas>
      </div>
    </div>
  </div>
</template>

<script>
import { Chart, registerables } from "chart.js";
Chart.register(...registerables);

export default {
  mounted: function () {
    this.$nextTick(function () {
      const config = {
        type: "line",
        data: {
          labels: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
          ],
          datasets: [
            {
              label: new Date().getFullYear(),
              backgroundColor: "rgba(76, 81, 191, 0.5)", // Semi-transparent blue
              borderColor: "#4c51bf", // Blue
              data: [65, 78, 66, 44, 56, 67, 75],
              fill: false,
            },
            {
              label: new Date().getFullYear() - 1,
              backgroundColor: "rgba(255, 255, 255, 0.5)", // Semi-transparent white
              borderColor: "#fff", // White
              data: [40, 68, 86, 74, 56, 60, 87],
              fill: false,
            },
          ],
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          plugins: {
            legend: {
              labels: {
                color: "white",
              },
              align: "end",
              position: "bottom",
            },
          },
          scales: {
            x: {
              ticks: {
                color: "rgba(255,255,255,.7)",
              },
              display: true,
              title: {
                display: false,
                color: "white",
              },
              grid: {
                display: false,
                borderDash: [2],
                borderDashOffset: [2],
                color: "rgba(33, 37, 41, 0.3)",
              },
            },
            y: {
              ticks: {
                color: "rgba(255,255,255,.7)",
              },
              display: true,
              title: {
                display: false,
                color: "white",
              },
              grid: {
                borderDash: [3],
                borderDashOffset: [3],
                drawBorder: false,
                color: "rgba(255, 255, 255, 0.15)",
              },
            },
          },
        },
      };

      const ctx = document.getElementById("line-chart").getContext("2d");
      // Set the canvas background to black
      ctx.canvas.parentNode.style.backgroundColor = "black";
      window.myLine = new Chart(ctx, config);
    });
  },
};
</script>

<style>
  .bg-black {
    background-color: black;
  }
</style>
