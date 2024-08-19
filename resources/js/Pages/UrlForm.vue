<template>
    <div class="url-form">
      <h2 class="header-text">Enter URL</h2>
      <form @submit.prevent="submitForm">
        <input type="url" v-model="originalUrl" class="url-input" placeholder="Enter the original URL" required />
        <button type="submit" class="submit-button">Shorten</button>
      </form>
    </div>
</template>

<script>
export default {
    data() {
      return {
        originalUrl: '',
      };
    },
    methods: {
      async submitForm() {
        try {
          const response = await fetch('/api/url/shorten', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify({ original_url: this.originalUrl }),
          });
          const data = await response.json();
        //   console.log(data);
          if (response.ok) {
            alert(`Shortened URL: ${data.shortened_url}`);
            window.location.href = '/urls';
          } else {
            alert('Error shortening URL');
          }
        } catch (error) {
          alert('An error occurred: ' + error.message);
        }
      },
    },
};
</script>

<style scoped>
.url-form {
  margin: 20px;
}

.header-text {
  color: #a0aec0; 
  margin-bottom: 10px; 
}

.url-input {
  border-radius: 5px; 
  padding: 10px;
  width: 400px; 
  border: 1px solid #ccc; 
}

.submit-button {
  background-color: #6875f5; 
  color: white; 
  border: none; 
  border-radius: 5px; 
  padding: 10px 15px; 
  cursor: pointer; 
  margin-left: 10px; 
}

.submit-button:hover {
  background-color: darkblue; 
}
</style>