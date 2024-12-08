<?php

namespace App\Enums;

enum DocumentTypeEnum: string
{
    case Barangay_Clearance = 'Barangay Clearance';
    case Barangay_Indigency_Certificate = 'Barangay Indigency Certificate';
    case Barangay_Business_Permit = 'Barangay Business Permit';
    case Barangay_Blotter_Complaint_Report = 'Barangay Blotter/Complaint Report';
    case Barangay_Permit_to_Construct = 'Barangay Permit to Construct';
    case Barangay_Certificate = 'Barangay Certificate';
    case Barangay_Medic_Legal_Certificate = 'Barangay Medic Legal Certificate';
    case Barangay_Fencing_Permit = 'Baranggay Fencing Permit';

}
