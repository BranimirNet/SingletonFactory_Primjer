<?php 

interface Exportable {
    public function exportData(): bool|string;
    public function retired();
}

class Employee implements Exportable {
    private string $firstName;
    private string $lastName;
    private string $jobTitle;
    private int $godiste;

    public function __construct($firstName, $lastName, $jobTitle, $godiste) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->jobTitle = $jobTitle;
        $this->godiste = $godiste;
    }

    public function exportData(): bool|string {
        return json_encode([
            "firstName" => $this->firstName,
            "lastName" => $this->lastName,
            "jobTitle" => $this->jobTitle,
            "godiste" => $this->godiste
        ], JSON_PRETTY_PRINT);
    }

    public function retired() {
        $razlika = date("Y") - $this->godiste;
        if ($razlika >= 50) {
            return "<br>Status: Za mirovinu";
        } else {
            return "<br>Status: Radni odnos";
        }
    }
}

class Customer implements Exportable {
    private string $customerName;
    private string $country;
    private int $grade;
    private int $godiste;

    public function __construct($customerName, $country, $grade, $godiste) {
        $this->customerName = $customerName;
        $this->country = $country;
        $this->grade = $grade;
        $this->godiste = $godiste;
    }

    public function exportData(): bool|string {
        return json_encode([
            "customerName" => $this->customerName,
            "country" => $this->country,
            "grade" => $this->grade,
            "godiste" => $this->godiste
        ], JSON_PRETTY_PRINT);
    }

    public function retired() {
        $razlika = date("Y") - $this->godiste;
        if ($razlika >= 65) {
            return "<br>Status: Za mirovinu";
        } else {
            return "<br>Status: Radni odnos";
        }
    }
}

$employee = new Employee("John", "Doe", "Developer", 1957);
echo $employee->exportData();
echo $employee->retired();

echo "<br><br>";

$cust = new Customer("Acme Corp", "USA", 5, 1970);
echo $cust->exportData();
echo $cust->retired();

?>
