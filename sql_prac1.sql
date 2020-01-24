CREATE TABLE Persons (
    PersonID int,
    LastName varchar(255),
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255)
);


/*
-- 6. Return a list of employees who have the JobTitle Network Administrator and--    were hired in 2009. Sort the result by HireDate from most recently hired to --    least recently hired. 

Select * From HumanResources.Employee
Where HireDate >= '01/01/2009' AND HireDate <= '12/31/2009'
Order By HireDate Desc

-- 7. Using the query from #6, return only employees who are salaried

Select * From HumanResources.Employee
Where HireDate >= '01/01/2009' AND HireDate <= '12/31/2009' AND SalariedFlag = 1
Order By HireDate Desc

Select * From HumanResources.Employee
Where LEFT(BusinessEntityID, 3) IN ('9%');
Select * From HumanResources.Employee
Where BusinessEntityID Like '%%9';
Select customerid, sum(totaldue) as AmtSpentfrom Sales.SalesOrderHeader
Where Year(OrderDate) = 2013
group by customerid
Order by AmtSpent Desc

-- Unique comb of cust ids and saleperson ids w acct num starting w 10 and living in territory id 1 or 5,, include avg total amt due
Select customerid, SalesPersonID, TerritoryID, avg(totaldue) as AvgSpent
from Sales.SalesOrderHeader
Where AccountNumber Like '10%' AND TerritoryID IN ('1', '5')
group by customerid, SalesPersonID, TerritoryID
Order by AvgSpent Desc

AVERAGE Return a distinct list of customer IDs that placed an online order also incl avg of subtot and totdue
Select customerid, AVG(SubTotal) as AvgSubTot, AVG(TotalDue) as AvgTotDue
FROM Sales.SalesOrderHeader
group by CustomerID

Select customerid, SalesPersonID, TerritoryID, avg(totaldue) as AvgSpent
from Sales.SalesOrderHeader
Where AccountNumber Like '10%' AND TerritoryID IN ('1', '5')
group by customerid, SalesPersonID, TerritoryID
Order by AvgSpent Desc*/

/*Return a distinct list of customer IDs that placed an online order and includethe date of the 1st order and the date of the most recent order also include thenumber of orders each customer has placed-- 
Sales.SalesOrderHeader
Select CustomerID, MIN(OrderDate), MAX(OrderDate), Count(*)
From Sales.SalesOrderHeader
Where OnlineOrderFlag = 1
Group By CustomerID
Order By Count(*)

Return the customer IDs of the most recent online order
Select Top 1 CustomerID, MIN(OrderDate), MAX(OrderDate), Count(*)
From Sales.SalesOrderHeader
Where OnlineOrderFlag = 1
Group By CustomerID
Order By Count(*)


/*How many customers are in territory id 4 and 5*/

Select CustomerID, TerritoryID, Count(*) as NumofPeople From Sales.SalesOrderHeader
Where TerritoryID in ('4', '5')
Group By CustomerID, TerritoryID

Select Count(*)  -- = 6710 From Sales.SalesOrderHeader
Where TerritoryID in ('4', '5')

Select Count(*)
From [HumanResources].[Employee]
Group By JobTitle, Gender -- 93 (removes dups)

Select count(gender)
From HumanResources.Employee
Where Gender = 'F'

Select count(SalesPersonID)
From Sales.SalesOrderHeader
Where TerritoryID IN ('5', '4') or SalesPersonID = NULL -- Does not work, use case statement

Select Count(*)  -- = 6710 From Sales.SalesOrderHeader 
Where TerritoryID in ('4', '5')*/







-- 1.  Return top 20 SellStartDate,ProductModelID from the products table where ProductModelId is not Unknown; sort by SellStartDate ,ProductModelID
--            HINT: Production.Product

/*Select SellStartDate, ProductModelID From Production.ProductOrder by ProductModelID Desc, SellStartDate */
 
-- 2.  Return all products where the Color is either Black or red; sort by color
--            HINT: Production.Product

/*Select ProductID, ColorFrom Production.ProductWhere Color = 'Black' OR Color = 'Red'Order by Color*/ 
 
--  3. Return all orders with the following SalesOrderNumber: SO44810, SO44811, SO44812
--            HINT: Sales.SalesOrderHeader /*Select *From Sales.SalesOrderHeader Where SalesOrderNumber in ('SO44810', 'SO44811', 'SO44812')*/
 

-- LIKE  : Is used to filter records that contains specific values
--      : A wildcard % is used to perform a string search
-- Please pay attention to the placement of the wilcard character within the search criteria 
 
 
-- 4.  Return all products where the name ends with bracket
--            HINT: Production.Product /*Select *From Production.Product Where Name Like '%]'*/
 
-- 5.  Return all products where the name contains  washer
--            HINT: Production.Product

/*Select *From Production.ProductWhere Name Like '%washer%'*/
 

-- IS \ IS NOT   : This operators are used for NULL values
 
--     6.     Return all products where color is unknown
--            HINT: Production.Product /*Select *From Production.Product Where Color IS NULL*/
 
 
-- 7.  Return all products where ProductLine is  NOT unknown
--            HINT: Production.Product /*Select *From Production.Product Where ProductLine IS NOT NULL*/ 

-- Using the AND, BETWEEN and OR Operator
 
-- Remember the YEAR() operator can be used to determine the Year portion of a specific date
 
 
-- 8. Return all orders that were placed between the year 2011 and 2012
--            HINT: Sales.SalesOrderHeader /*Select *From Sales.SalesOrderHeader Where Year(OrderDate) Between 2011 AND 2012*/ 
 

-- 9. Return all order with TotalDue of 25000 or more that were placed between 2011 and 2012
--            HINT: Sales.SalesOrderHeader/*Select *From Sales.SalesOrderHeaderWhere TotalDue >= 25000 ANd Year(OrderDate) Between 2011 AND 2012 */ 
 
-- 10. Return all active vendors who have a credit rating greater than 3
--            HINT: Purchasing.Vendor/*Select *From Purchasing.VendorWhere CreditRating > 3*/


/*#####################################*/
-- Team DAYChuch SQL Questions

/*1. How many Preachers gave a sermon in 2018?*/

Select COUNT (*) AS Preachers2018from [dbo].[Sermon]
WHERE  SermonDate BETWEEN '01/01/2018' AND '12/31/2018'
/*2. How many Sermons did Gilbert Johnson give in 2019?*/
Select COUNT (*) AS Sermonsfrom [dbo].[Sermon] AS SINNER JOIN [dbo].[Preacher] AS PON S.PreacherID = P.PreacherID
WHERE Firstname = 'Gilbert' AND SermonDate BETWEEN '01/01/2019' AND '12/31/2019'

/*3. How many Sermons have  been scheduled to be preached for a future date?*/
Select COUNT (*) AS Sermonsfrom [dbo].[Sermon]
WHERE  SermonDate > '02/05/2019'

/*4. Provide the full name of the preachers*/
SELECT Concat (Firstname,'  ', Lastname) AS Fullname FROM [dbo].[Preacher]

/*5. Provide the first name , last name and the telephone area codes of everyone that submitted a prayer request*/
Select Firstname, Lastname, LEFT(PhoneNumber, 3) AS AreacodeFrom [dbo].[PrayerRequest]

/*6. Provide the full name, city , state , zip of all donors and how much each donor donated in 2018. */
SELECT Firstname, Lastname, City, State, Zip, SUM (DonationAmount) AS TotalDonation2018
From [dbo].[DonatioN] AS D1
INNER JOIN [dbo].[Donor] AS D2ON D1.DonorID = D2.DonorID
WHERE Donationdate BETWEEN '01/01/2018' AND '12/31/2018'
GROUP BY D1.DonorID, Firstname, Lastname, City, State, Zip

/*7. Provide the total amount donated summarized by year*/
SELECT  YEAR(DonationDate) AS YEAR, SUM (DonationAmount) AS TotalDonationFrom [dbo].[DonatioN] 
GROUP BY YEAR(DonationDate)

/*8. What state donated the most in 2019? */
SELECT TOP 1 State, SUM (DonationAmount) AS TotalDonation2019From [dbo].[DonatioN] AS D1
INNER JOIN [dbo].[Donor] AS D2ON D1.DonorID = D2.DonorID
WHERE Donationdate BETWEEN '01/01/2019' AND '12/31/2019'
GROUP BY  StateORDER BY State DESC

/*9.  What zip code donated the least in 2018? */
SELECT TOP 1 Zip, SUM (DonationAmount) AS TotalDonation2018From [dbo].[DonatioN] AS D1
INNER JOIN [dbo].[Donor] AS D2ON D1.DonorID = D2.DonorID
WHERE Donationdate BETWEEN '01/01/2018' AND '12/31/2018'
GROUP BY  ZipORDER BY Zip ASC

/*10. Provide the full names of the top 5 donors in 2018?*/
SELECT TOP 5 Firstname, Lastname, SUM (DonationAmount) AS TotalDonation2018From [dbo].[DonatioN] AS D1
INNER JOIN [dbo].[Donor] AS D2ON D1.DonorID = D2.DonorID
WHERE Donationdate BETWEEN '01/01/2018' AND '12/31/2018'
GROUP BY Firstname, LastnameORDER BY TotalDonation2018 DESC

/*11. Provide the full names of the bottom 5 donors in 2018?*/
SELECT TOP 5 Firstname, Lastname, SUM (DonationAmount) AS TotalDonation2018From [dbo].[DonatioN] AS D1
INNER JOIN [dbo].[Donor] AS D2ON D1.DonorID = D2.DonorID
WHERE Donationdate BETWEEN '01/01/2018' AND '12/31/2018'
GROUP BY Firstname, LastnameORDER BY TotalDonation2018 ASC

/*12. You are required to create a report that will display donation amount based on historical and pledgedCreate a derived column (Status) that will 
display the following :If donation occured prior to today, display "historialIf donation occus in the future, display "Pledged"Aggregate you result by the 
sum of donation and status */
SELECT Firstname, Lastname, DonationAmount,
CASE WHEN Donationdate > '02/05/2019'  THEN  'Pledge'
WHEN Donationdate <= '02/05/2019'  THEN  'Historical'
END AS StatusFrom [dbo].[DonatioN] AS D1
INNER JOIN [dbo].[Donor] AS D2ON D1.DonorID = D2.DonorID

/*13. You are required to generate a username for all the donors so they will be able to log in to view their donationsPlease write a query that will return 
the fullname,  and the concatenated value of the first letter of their first name and the last name to create a user name

Ex:SELECT Concat (Firstname,'  ', Lastname) AS Fullname FROM [dbo].[Preacher]*/
SELECT Firstname, Lastname, Concat (left(Firstname, 1),'', Lastname) AS UsernameFROM [dbo].[Donor]

/*14. Write a query that will remove all the dashes in the donors phone number. Also include the donors first and lastname in the query*/
SELECT Firstname, Lastname, REPLACE (Phonenumber, '-','') AS NewPhoneNumFROM[dbo].[Donor]

/*15. Write a query that will display the donors full name and their total donation by month and year
*/

SELECT Concat (Firstname,'  ', Lastname) AS Fullname, month(DonationDate) AS DonationMonth, year(DonationDate) AS DonationYear, 
SUM (DonationAmount) AS TotalDonationFrom [dbo].[Donation] AS D1
JOIN [dbo].[Donor] AS D2ON D1.DonorID = D2.DonorID
GROUP BY Firstname, Lastname, year(DonationDate), month(DonationDate) 
ORDER BY Fullname, year(DonationDate), month(DonationDate) ASC

/*16.Write a query that will return the number of upcoming church events*/
SELECT Count(*) As UpcomingEventsFROM [dbo].[ChurchEvent]
WHERE EventDate > '02/06/2019'

/*17. Provide a count of church events by year and month*/
SELECT month(EventDate) AS EventMonth, year(EventDate) AS EventYear, Count (*) As ChurchEvents
FROM [dbo].[ChurchEvent]
Group By year(EventDate), month(EventDate)

/*18. Based on your query generated for question 17, please exclude events where counts are less than 3 */
SELECT month(EventDate) AS EventMonth, year(EventDate) AS EventYear, Count (*) As ChurchEvents
FROM [dbo].[ChurchEvent]
Group By year(EventDate), month(EventDate)
HAVING count(*) >= 3

/*19. What topics were the strongest for you in class ? */

/*20. What topic(s) did you struggle with in the class?*/