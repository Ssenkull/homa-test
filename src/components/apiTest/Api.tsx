import React, { useState } from "react";

function ApiComponent() {
  const [message, setMessage] = useState("");
  const [date, setDate] = useState("");
  const [name, setName] = useState("");
  const [age, setAge] = useState(""); 
  const [apiData, setApiData] = useState(null); 
  //@ts-ignore
  const handleDateChange = (e) => {

    setDate(e.target.value);
  };
  //@ts-ignore
  const handleNameChange = (e) => {
    setName(e.target.value);
  };
//@ts-ignore
  const handleAgeChange = (e) => {
    setAge(e.target.value);
  };

  //@ts-ignore

  const isValidDate = (dateString) => {
    // Validate the date format as "DD/MM/YYYY"
    const regex = /^(\d{2})\/(\d{2})\/(\d{4})$/;
    return regex.test(dateString);
  };

  const fetchData = () => {
    if (!isValidDate(date)) {
      setMessage("Invalid date format. Please use DD/MM/YYYY.");
      return;
    }

    
    const apiUrl = `http://localhost:8000/api.php?birthdate=${date}`;

   
    fetch(apiUrl)
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data) => {
        if (data.error) {
          setMessage(data.error);
        } else {
         
          setAge(data.age);
          setApiData(data); 
          setMessage(""); 
          console.log(apiData);
        }
      })
      .catch((error) => {
        setMessage("There was a problem with the fetch operation: " + error.message);
      });
  };

  return (
    <div>
      <h1>API Response:</h1>
      {message && <p>{message}</p>}
      {age && <p>Age: {age}</p>} {/* Display the age */}
      {apiData && (
        <div>
          {/* <p>a: {apiData.a}</p>
          <p>b: {apiData.b}</p>
          <p>c: {apiData.c}</p>
          <p>e: {apiData.e}</p>
          <p>center: { apiData.center}</p>
          <p>c_1: {apiData.c_1}</p>
          <p>c_2: {apiData.c_2}</p>
          <p>c_3: {apiData.c_3}</p>
          <p>c_4: {apiData.c_4}</p>
          <p>c_1_3: {apiData.c_1_3}</p>
          <p>c_2_3: {apiData.c_2_3}</p>
          <p>c_3_3: {apiData.c_3_3}</p>
          <p>c_4_3: {apiData.c_4_3}</p>
          <p>c_1_2: {apiData.c_1_2}</p>
          <p>c_2_2: {apiData.c_2_2}</p>
          <p>c_3_2: {apiData.c_3_2}</p>
          <p>c_4_2: {apiData.c_4_2}</p>
          <p>a_3: {apiData.a_3}</p>
          <p>b_3: {apiData.b_3}</p>
          <p>e_3: {apiData.e_3}</p>
          <p>a_3: {apiData.a_2}</p>
          <p>b_2: {apiData.b_2}</p>
          <p>year_2: {apiData.year_2}</p>
          <p>e_2: {apiData.e_2}</p>
          <p>a_b_3: {apiData.a_b_3}</p>
          <p>r_1: {apiData.r_1}</p>
          <p>r_2: {apiData.r_2}</p>
          <p>r_3: {apiData.r_3}</p>
          <p>center_1: {apiData.center_1}</p>
          <p>center_2: {apiData.center_2}</p>
          <p>love: {apiData.love}</p>
          <p>money: {apiData.money}</p>
          <p>sky: {apiData.sky}</p>
          <p>earth: {apiData.earth}</p>
          <p>sum: {apiData.sum}</p>
          <p>men: {apiData.men}</p>
          <p>women: {apiData.women}</p>
          <p>sum_2: {apiData.sum_2}</p>
          <p>sum_3: {apiData.sum_3}</p> */}

          {/* Add more data fields here */}
        </div>
      )}
      <div>
        <label>Date (DD/MM/YYYY):</label>
        <input type="text" placeholder="DD/MM/YYYY" value={date} onChange={handleDateChange} />
      </div>
      <div>
        <label>Name:</label>
        <input type="text" value={name} onChange={handleNameChange} />
      </div>
      <button onClick={fetchData}>Fetch Data</button>
    </div>
  );
}

export default ApiComponent;
