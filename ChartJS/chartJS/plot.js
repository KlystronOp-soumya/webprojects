async function catchData()
{
    const response= await fetch('https://docs.google.com/spreadsheets/d/1TRrABJBTf-OSvkfgdBVsWKEUXnkfE1zeP7tO_M0TcGw/edit?usp=sharing');
    const data= await response.text();
    const rows=data.split('\n');
    console.log(rows);


}
