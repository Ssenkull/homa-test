import React, { useState, useEffect } from "react";

// Define the type for the API response
type ApiData = Record<string, string | number>;

function ApiComponent() {
  const [message, setMessage] = useState("");
  const [date, setDate] = useState("");
  const [apiData, setApiData] = useState<ApiData | null>(null);
  const [connectionSuccess, setConnectionSuccess] = useState(false);

  const handleDateChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setDate(e.target.value);
  };

  const isValidDate = (dateString: string) => {
    // Validate the date format as "DD/MM/YYYY"
    const regex = /^(\d{2})\/(\d{2})\/(\d{4})$/;
    return regex.test(dateString);
  };

  useEffect(() => {
    if (apiData) {
      console.log(apiData);
    }
  }, [apiData]);

  const fetchData = () => {
    if (!isValidDate(date)) {
      setMessage("Invalid date format. Please use DD/MM/YYYY.");
      return;
    }

    const apiUrl = `http://localhost:8000/homa-test/api/api.php?birthdate=${date}`;

    fetch(apiUrl)
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.json();
      })
      .then((data: ApiData) => {
        if (data.error) {
         
        } else {
          // Decode Unicode characters in the data
          const decodedData: ApiData = decodeUnicode(data);
          setApiData(decodedData);
          setMessage("");
        }
      })
      .catch((error) => {
        setMessage("There was a problem with the fetch operation: " + error.message);
      });
  };

  // Function to decode Unicode characters in an object
  const decodeUnicode = (obj: ApiData) => {
    const decodedObj: ApiData = {};

    for (const key in obj) {
      if (Object.prototype.hasOwnProperty.call(obj, key)) {
        // Decode Unicode characters using the decodeURIComponent function
        decodedObj[key] = decodeURIComponent(obj[key] as string);
      }
    }

    return decodedObj;
  };

  return (
    <div>
      <h1>API Response:</h1>
      {message && <p>{message}</p>}
      {apiData && (
        <div>
          <pre>
            {JSON.stringify(apiData, null, 2)} {/* Display the decoded JSON data */}
          </pre>
        </div>
      )}
      <div>
        <label>Date (DD/MM/YYYY):</label>
        <input type="text" placeholder="DD/MM/YYYY" value={date} onChange={handleDateChange} />
      </div>
      <button onClick={fetchData}>Fetch Data</button>
    </div>
  );
}

export default ApiComponent;
