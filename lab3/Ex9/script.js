//set a header for the api
const headers = new Headers();
headers.append("app-id", "6514532364575f06564037c6");

document.addEventListener("DOMContentLoaded", () => {
  const avail_button = document.getElementById("avail-button");
  const data1 = document.getElementById("data1");

  avail_button.addEventListener("click", async () => {
    const api1 = "https://dummyapi.io/data/v1/user";
    let response = "";

    try {
      const apiResponse = await fetch(api1, {
        //use GET request to fetch data
        method: "GET",
        headers: headers,
      });

      if (!apiResponse.ok) {
        throw new Error(`API request failed with status ${apiResponse.status}`);
      }

      const data = await apiResponse.json();

      for (let i = 0; i < data.data.length; i++) {
        response += `${data.data[i].firstName} ${data.data[i].lastName} ( ${data.data[i].id} )\n`;
      }

      data1.innerHTML = `<pre>${response}</pre>`;
    } catch (error) {
      data1.innerHTML = "<p>Error fetching data from the API.</p>";
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const info_button = document.getElementById("info-button");
  const data2 = document.getElementById("data2");

  info_button.addEventListener("click", async () => {
    const profile_input = document.getElementById("profile-input").value;
    const api2 = `https://dummyapi.io/data/v1/user/${profile_input}`;

    try {
      const apiResponse = await fetch(api2, {
        method: "GET",
        headers: headers,
      });

      if (!apiResponse.ok) {
        throw new Error(`API request failed with status ${apiResponse.status}`);
      }

      const data = await apiResponse.json();

      let response = `Full name: ${data.firstName} ${data.lastName} \n`;
      response += `Date of birth: ${data.dateOfBirth.substring(0, 10)} \n`;
      response += `Gender: ${data.gender} \n`;
      response += `Email: ${data.email} \n`;
      response += `Contact: ${data.phone} \n`;
      response += `Register: ${data.registerDate} \n`;
      response += `Location: ${data.location.street}, ${data.location.state}, ${data.location.city}, ${data.location.country}`;

      data2.innerHTML = `<pre>${response}</pre>`;
    } catch (error) {
      data2.innerHTML = "<p>Error fetching data from the API.</p>";
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const posted_button = document.getElementById("posted-button");
  const data3 = document.getElementById("data3");

  posted_button.addEventListener("click", async () => {
    const api3 = `https://dummyapi.io/data/v1/post`;

    try {
      const apiResponse = await fetch(api3, {
        method: "GET",
        headers: headers,
      });

      if (!apiResponse.ok) {
        throw new Error(`API request failed with status ${apiResponse.status}`);
      }

      const data = await apiResponse.json();

      let response = "";
      for (let i = 0; i < data.limit; i++) {
        let username = `${data.data[i].owner.firstName} ${data.data[i].owner.lastName}`;
        let count = 0;
        for (let x = 0; x < data.limit; x++) {
          if (
            username ==
            `${data.data[x].owner.firstName} ${data.data[x].owner.lastName}`
          ) {
            count++;
          }
        }
        response += `${username}: Posted: ${count} \n`;
      }
      data3.innerHTML = `<pre>${response}</pre>`;
    } catch (error) {
      data3.innerHTML = "<p>Error fetching data from the API.</p>";
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const picture_button = document.getElementById("picture-button");
  const data4 = document.getElementById("data4");

  picture_button.addEventListener("click", async () => {
    const picture_input = document.getElementById("picture-input").value;
    const api4 = `https://dummyapi.io/data/v1/post`;

    try {
      const apiResponse = await fetch(api4, {
        method: "GET",
        headers: headers,
      });

      if (!apiResponse.ok) {
        throw new Error(`API request failed with status ${apiResponse.status}`);
      }

      const data = await apiResponse.json();

      let responseArray = [];
      let imgArray = [];
      for (let x = 0; x < data.limit; x++) {
        let response = "";
        if (
          picture_input ==
          `${data.data[x].owner.firstName} ${data.data[x].owner.lastName}`
        ) {
          response += `Username: ${picture_input} \n`;
          response += `UpdateTime: ${data.data[x].publishDate.substring(
            0,
            10
          )} \n`;
          response += `Content: ${data.data[x].text} \n`;
          response += `Like: ${data.data[x].likes} \n`;
          response += `Category: `;
          for (let i = 0; i < data.data[x].tags.length; i++) {
            response += `[${data.data[x].tags[i]}]`;
          }
          response += `\n`;
          imgArray.push(data.data[x].image);
          responseArray.push(response);
        }
      }
      let lastResponse = "";
      for (let x = 0; x < imgArray.length; x++) {
        lastResponse += `<pre>${responseArray[x]}</pre><br><img src="${imgArray[x]}" width="200" height="200"><br>`;
      }
      data4.innerHTML = lastResponse;
    } catch (error) {
      data4.innerHTML = "<p>Error fetching data from the API.</p>";
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const button5 = document.getElementById("button5");
  const data5 = document.getElementById("data5");

  button5.addEventListener("click", async () => {
    document.getElementById("picture-input").value;
    const api5 = `https://dummyapi.io/data/v1/post`;

    try {
      const apiResponse = await fetch(api5, {
        method: "GET",
        headers: headers,
      });

      if (!apiResponse.ok) {
        throw new Error(`API request failed with status ${apiResponse.status}`);
      }

      const data = await apiResponse.json();

      let responseArray = [];
      let imgArray = [];
      for (let x = 0; x < data.limit; x++) {
        let response = "";
        response += `Post id: ${data.data[x].id} \n`;
        response += `Username: ${data.data[x].owner.firstName} ${data.data[x].owner.lastName} \n`;
        response += `UpdateTime: ${data.data[x].publishDate.substring(
          0,
          10
        )} \n`;
        response += `Content: ${data.data[x].text} \n`;
        response += `Like: ${data.data[x].likes} \n`;
        response += `Category: `;
        for (let i = 0; i < data.data[x].tags.length; i++) {
          response += `[${data.data[x].tags[i]}]`;
        }
        response += `\n`;
        imgArray.push(data.data[x].image);
        responseArray.push(response);
      }
      let lastResponse = "";
      for (let x = 0; x < imgArray.length; x++) {
        lastResponse += `<pre>${responseArray[x]}</pre><br><img src="${imgArray[x]}" width="200" height="200"><br>`;
      }
      data5.innerHTML = lastResponse;
    } catch (error) {
      data5.innerHTML = "<p>Error fetching data from the API.</p>";
    }
  });
});
