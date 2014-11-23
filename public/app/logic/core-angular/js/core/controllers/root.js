(function(angular) {

    /**
     * @ngInject
     */
    function RootCtrl($scope, CategoryService, UtilityService, MapService, ClassificationService, SearchService, NoticeTypeService, $mdSidenav) {
        var vm = this;
        vm.regionData = { data: [], style: {} };
        vm.provinceData = { data: [], style: {} };
        vm.mapData = vm.regionData;
        vm.filtersOpen = true;
        vm.selectedNoticeType = 0;

        vm.searchResults = [{"ref_no":832625,"solicitation_no":0,"name":"Procurement of Office Supplies & other Office Supplies (2nd Quarter) for SB.","description":"Pursuant to section 52.b of RA 9184, Implementing rules and regulations.","special_instruction":"","notice_type":"Request for Quotation (RFQ)","tender_status":"Awarded","classification":"Goods","business_category":"Office Equipment Supplies and Consumables","procurement_mode":"Shopping","funding_instrument":"Budget for the Contract Approved by the Sanggunian","funding_source":"Government of the Philippines (GOP)","approved_budget":13000,"contract_duration":"1 Day\/s","trade_agreement":"Implementing Rules and Regulations","pre_bid_date":null,"pre_bid_venue":"","procuring_entity_org":{"website":"http:\/\/www.bauang.com","org_id":12988,"org_status":"Active","member_type":"Buyer","country_code":"PH","is_org_foreign":false,"member_type_id":2,"province":"La Union","government_organization_type":"Municipal Government","org_reg_date":"2004-05-20T11:45:04","modified_date":"2012-05-25T11:44:22","zip_code":"2501","org_name":"MUNICIPALITY OF BAUANG, LA UNION","city":"Bauang","address1":"Central West, Bauang, La Union","address2":"","address3":"","parent_org_id":0,"org_description":"","goverment_branch":"Local Government Unit (LGU)","country":"Philippines","region":"Region I","_full_text":"'2501':26 'activ':27 'bauang':4,20,23 'buyer':1 'central':21 'govern':8,12 'la':5,18,24 'lgu':10 'local':7 'municip':2,11 'ph':14 'philippin':15 'region':16 'union':6,19,25 'unit':9 'west':22 'www.bauang.com':13","supplier_form_of_organization":"","_id":71681,"supplier_organization_type":""},"publish_date":"2009-03-19T00:00:00","closing_date":"2009-03-20T16:00:00","contact":{"person":"Ricarte De Guzman Tadeja","address":"Ricarte De Guzman Tadeja[rc]BAC Chairman[rc]Central West, Bauang, La Union  [rc]Bauang[rc]La Union[rc]Philippines 2501"},"collection":{"contract":null,"point":"Central West, Bauang, La Union[rc][nl]Bauang[rc][nl]La Union[rc][nl]Philippines 2501[rc][nl]63-75-7050139[rc][nl]63-75-7051102"},"award_details":{"qty":0,"award_id":115475,"award_reason":"Lowest responsive bidder","proceed_date":null,"line_item_id":0,"item_description":"","unspsc_description":"","award_date":"2009-03-23T00:00:00","modified_date":"2009-03-23T15:20:28","contract_amt":11910,"item_name":"","previous_award_id":0,"awardee":"GIOSETECH GENERAL MERCHANDISE","is_reaward":false,"award_type":"Award Notice","contract_no":"","uom":"","award_title":"Procurement of Office Supplies & other Office Supplies (2nd Quarter) for SB.","contract_enddate":null,"award_status":"Posted","reason":"","is_short_list":false,"unspsc_code":0,"ref_id":"832625","is_amp":false,"awardee_id":13863,"_full_text":"'2nd':9 '832625':1 'award':17 'bidder':21 'general':15 'giosetech':14 'lowest':19 'merchandis':16 'notic':18 'offic':4,7 'post':13 'procur':2 'quarter':10 'respons':20 'sb':12 'suppli':5,8","budget":0,"publish_date":"2009-03-23T15:20:28","_id":3414,"contract_start_date":null},"project_location":{"modified_date":"2009-03-18T10:01:59","_id":87401,"_full_text":"'832625':1 'la':2 'union':3","refid":"832625","location":"La Union"},"coordinates":{"south":29.919923,"west":-82.5761429,"north":30.143117,"east":-82.1378579}},{"ref_no":832588,"solicitation_no":0,"name":"Procurement of Nursery Supplies for MENRO Office.","description":"Pursuant to section 52.b of RA 9184, Implementing rules and regulations.","special_instruction":"","notice_type":"Request for Quotation (RFQ)","tender_status":"Awarded","classification":"Goods","business_category":"General Merchandise","procurement_mode":"Shopping","funding_instrument":"Budget for the Contract Approved by the Sanggunian","funding_source":"Government of the Philippines (GOP)","approved_budget":11000,"contract_duration":"1 Day\/s","trade_agreement":"Implementing Rules and Regulations","pre_bid_date":null,"pre_bid_venue":"","procuring_entity_org":{"website":"http:\/\/www.bauang.com","org_id":12988,"org_status":"Active","member_type":"Buyer","country_code":"PH","is_org_foreign":false,"member_type_id":2,"province":"La Union","government_organization_type":"Municipal Government","org_reg_date":"2004-05-20T11:45:04","modified_date":"2012-05-25T11:44:22","zip_code":"2501","org_name":"MUNICIPALITY OF BAUANG, LA UNION","city":"Bauang","address1":"Central West, Bauang, La Union","address2":"","address3":"","parent_org_id":0,"org_description":"","goverment_branch":"Local Government Unit (LGU)","country":"Philippines","region":"Region I","_full_text":"'2501':26 'activ':27 'bauang':4,20,23 'buyer':1 'central':21 'govern':8,12 'la':5,18,24 'lgu':10 'local':7 'municip':2,11 'ph':14 'philippin':15 'region':16 'union':6,19,25 'unit':9 'west':22 'www.bauang.com':13","supplier_form_of_organization":"","_id":71681,"supplier_organization_type":""},"publish_date":"2009-03-19T00:00:00","closing_date":"2009-03-20T16:00:00","contact":{"person":"Ricarte De Guzman Tadeja","address":"Ricarte De Guzman Tadeja[rc]BAC Chairman[rc]Central West, Bauang, La Union  [rc]Bauang[rc]La Union[rc]Philippines 2501"},"collection":{"contract":null,"point":"Central West, Bauang, La Union[rc][nl]Bauang[rc][nl]La Union[rc][nl]Philippines 2501[rc][nl]63-75-7050139[rc][nl]63-75-7051102"},"award_details":{"qty":0,"award_id":115470,"award_reason":"Lowest responsive bidder","proceed_date":null,"line_item_id":0,"item_description":"","unspsc_description":"","award_date":"2009-03-23T00:00:00","modified_date":"2009-03-23T14:59:31","contract_amt":10290,"item_name":"","previous_award_id":0,"awardee":"ANGELES BAUANG LUMBER CO.","is_reaward":false,"award_type":"Award Notice","contract_no":"","uom":"","award_title":"Procurement of Nursery Supplies for MENRO Office.","contract_enddate":null,"award_status":"Posted","reason":"","is_short_list":false,"unspsc_code":0,"ref_id":"832588","is_amp":false,"awardee_id":35701,"_full_text":"'832588':1 'angel':10 'award':14 'bauang':11 'bidder':18 'co':13 'lowest':16 'lumber':12 'menro':7 'notic':15 'nurseri':4 'offic':8 'post':9 'procur':2 'respons':17 'suppli':5","budget":0,"publish_date":"2009-03-23T14:59:31","_id":3407,"contract_start_date":null},"project_location":{"modified_date":"2009-03-18T09:48:44","_id":87368,"_full_text":"'832588':1 'la':2 'union':3","refid":"832588","location":"La Union"},"coordinates":{"south":29.919923,"west":-82.5761429,"north":30.143117,"east":-82.1378579}},{"ref_no":832607,"solicitation_no":0,"name":"Procurement of 1 pc. Solenoid 5w CS-1529 & 1 set Carbon Brush SN-31(Vehicle SFH-397) for SB.","description":"Pursuant to section 53.h of RA 9184, Implementing rules and regulations.","special_instruction":"","notice_type":"Request for Quotation (RFQ)","tender_status":"Awarded","classification":"Goods","business_category":"Vehicle Parts and Accessories","procurement_mode":"Negotiated Procurement","funding_instrument":"Budget for the Contract Approved by the Sanggunian","funding_source":"Government of the Philippines (GOP)","approved_budget":1500,"contract_duration":"1 Day\/s","trade_agreement":"Implementing Rules and Regulations","pre_bid_date":null,"pre_bid_venue":"","procuring_entity_org":{"website":"http:\/\/www.bauang.com","org_id":12988,"org_status":"Active","member_type":"Buyer","country_code":"PH","is_org_foreign":false,"member_type_id":2,"province":"La Union","government_organization_type":"Municipal Government","org_reg_date":"2004-05-20T11:45:04","modified_date":"2012-05-25T11:44:22","zip_code":"2501","org_name":"MUNICIPALITY OF BAUANG, LA UNION","city":"Bauang","address1":"Central West, Bauang, La Union","address2":"","address3":"","parent_org_id":0,"org_description":"","goverment_branch":"Local Government Unit (LGU)","country":"Philippines","region":"Region I","_full_text":"'2501':26 'activ':27 'bauang':4,20,23 'buyer':1 'central':21 'govern':8,12 'la':5,18,24 'lgu':10 'local':7 'municip':2,11 'ph':14 'philippin':15 'region':16 'union':6,19,25 'unit':9 'west':22 'www.bauang.com':13","supplier_form_of_organization":"","_id":71681,"supplier_organization_type":""},"publish_date":"2009-03-19T00:00:00","closing_date":"2009-03-20T16:00:00","contact":{"person":"Ricarte De Guzman Tadeja","address":"Ricarte De Guzman Tadeja[rc]BAC Chairman[rc]Central West, Bauang, La Union  [rc]Bauang[rc]La Union[rc]Philippines 2501"},"collection":{"contract":null,"point":"Central West, Bauang, La Union[rc][nl]Bauang[rc][nl]La Union[rc][nl]Philippines 2501[rc][nl]63-75-7050139[rc][nl]63-75-7051102"},"award_details":{"qty":0,"award_id":115473,"award_reason":"Lowest responsive bidder","proceed_date":null,"line_item_id":0,"item_description":"","unspsc_description":"","award_date":"2009-03-23T00:00:00","modified_date":"2009-03-23T15:12:36","contract_amt":1100,"item_name":"","previous_award_id":0,"awardee":"CARR BRAKE AUTO SUPPLY","is_reaward":false,"award_type":"Award Notice","contract_no":"","uom":"","award_title":"Procurement of 1 pc. Solenoid 5w CS-1529 & 1 set Carbon Brush SN-31(Vehicle SFH-397) for SB.","contract_enddate":null,"award_status":"Posted","reason":"","is_short_list":false,"unspsc_code":0,"ref_id":"832607","is_amp":false,"awardee_id":45537,"_full_text":"'-1529':9 '-31':15 '-397':18 '1':4,10 '5w':7 '832607':1 'auto':24 'award':26 'bidder':30 'brake':23 'brush':13 'carbon':12 'carr':22 'cs':8 'lowest':28 'notic':27 'pc':5 'post':21 'procur':2 'respons':29 'sb':20 'set':11 'sfh':17 'sn':14 'solenoid':6 'suppli':25 'vehicl':16","budget":0,"publish_date":"2009-03-23T15:12:36","_id":3412,"contract_start_date":null},"project_location":{"modified_date":"2009-03-18T09:55:11","_id":87378,"_full_text":"'832607':1 'la':2 'union':3","refid":"832607","location":"La Union"},"coordinates":{"south":29.919923,"west":-82.5761429,"north":30.143117,"east":-82.1378579}},{"ref_no":833341,"solicitation_no":0,"name":"Notice for the Use of Alternative Method for the Procurement of Sacks with Printing & Rubber Stencil for the Production of Organic Fertilizer","description":"Republic of the Philippines[rc][nl]Municipality of Cabugao[rc][nl]Province of Ilocos Sur[rc][nl][rc][nl]Notice for the Use of Alternative Method[rc][nl][rc][nl][rc][nl]Notice is given by the Bids & Awards Committee (BAC) of Municipality of Cabugao, Ilocos Sur to procure sacks with printing & rubber stencil shopping.[rc][nl][rc][nl]Unit Quantity Description[rc][nl][rc][nl]520 pcs Sack with Printing[rc][nl]1 unit Rubber Stencil[rc][nl][rc][nl]Total Amount: Php. 15,000.00[rc][nl][rc][nl]This is in compliance with the requirement of R.A. 9184 otherwise known as ?Government Procurement Reform Act? and Its Implementing Rules & Regulations ? A.[rc][nl][rc][nl][rc][nl][rc][nl](Sgd.)       FLORANTE S. JARA[rc][nl]                 BAC-Chairman\/MPDC","special_instruction":"","notice_type":"Request for Quotation (RFQ)","tender_status":"Awarded","classification":"Goods","business_category":"General Merchandise","procurement_mode":"Shopping","funding_instrument":"Budget for the Contract Approved by the Sanggunian","funding_source":"Government of the Philippines (GOP)","approved_budget":15000,"contract_duration":"1 Day\/s","trade_agreement":"Implementing Rules and Regulations","pre_bid_date":null,"pre_bid_venue":"","procuring_entity_org":{"website":"http:\/\/www.cabugao.gov.ph","org_id":9375,"org_status":"Active","member_type":"Buyer","country_code":"PH","is_org_foreign":false,"member_type_id":2,"province":"Ilocos Sur","government_organization_type":"Municipal Government","org_reg_date":"2004-01-07T16:10:14","modified_date":"2011-08-19T10:38:23","zip_code":"2732","org_name":"MUNICIPALITY OF CABUGAO, ILOCOS SUR","city":"Cabugao","address1":"Municipal Hall,","address2":"","address3":"","parent_org_id":0,"org_description":"","goverment_branch":"Local Government Unit (LGU)","country":"Philippines","region":"Region I","_full_text":"'2732':23 'activ':24 'buyer':1 'cabugao':4,20 'govern':8,12 'hall':22 'iloco':5,18 'lgu':10 'local':7 'municip':2,11,21 'ph':14 'philippin':15 'region':16 'sur':6,19 'unit':9 'www.cabugao.gov.ph':13","supplier_form_of_organization":"","_id":65591,"supplier_organization_type":""},"publish_date":"2009-03-19T00:00:00","closing_date":"2009-03-20T17:00:00","contact":{"person":"Hermes A Asit","address":"Hermes A Asit[rc]Planning Asst.\/BAC Secretariat[rc]Municipal Hall,  [rc]Cabugao[rc]Ilocos Sur[rc]Philippines 2732"},"collection":{"contract":null,"point":""},"award_details":{"qty":0,"award_id":115344,"award_reason":"Emergency Purchase","proceed_date":"2009-03-24T00:00:00","line_item_id":0,"item_description":"","unspsc_description":"","award_date":"2009-03-23T00:00:00","modified_date":"2009-03-23T08:39:26","contract_amt":15000,"item_name":"","previous_award_id":0,"awardee":"5 BROTHERS MARKETING","is_reaward":false,"award_type":"Emergency Purchase","contract_no":"Cab.-GSO-2009","uom":"","award_title":"Notice for the Use of Alternative Method for the Procurement of Sacks with Printing & Rubber Stencil for the Production of Organic Fertilizer","contract_enddate":"2009-03-24T00:00:00","award_status":"Posted","reason":"","is_short_list":false,"unspsc_code":0,"ref_id":"833341","is_amp":false,"awardee_id":49922,"_full_text":"'-2009':34 '5':25 '833341':1 'altern':7 'brother':26 'cab':32 'emerg':28,30 'fertil':23 'gso':33 'market':27 'method':8 'notic':2 'organ':22 'post':24 'print':15 'procur':11 'product':20 'purchas':29,31 'rubber':16 'sack':13 'stencil':17 'use':5","budget":0,"publish_date":"2009-03-23T08:38:44","_id":3271,"contract_start_date":"2009-03-24T00:00:00"},"project_location":{"modified_date":"2009-03-18T16:11:59","_id":88041,"_full_text":"'833341':1 'iloco':2 'sur':3","refid":"833341","location":"Ilocos Sur"},"coordinates":{"south":16.651038,"west":120.3444579,"north":17.8923179,"east":120.878885}},{"ref_no":832829,"solicitation_no":0,"name":"Negotiated Procurement for the Construction Materials @ Barangay Cuancabal, Cabugao Ilocos Sur","description":"Republic of the Philippines[rc][nl]Municipality of Cabugao[rc][nl]Province of Ilocos Sur[rc][nl]Barangay Cuancabal[rc][nl][rc][nl]Negotiated Procurement[rc][nl][rc][nl][rc][nl]Notice is given by the Bids & Awards Committee (BAC) of barangay Cuancabal Municipality of Cabugao, Ilocos Sur construction materials through negotiated procurement.[rc][nl][rc][nl]Unit Quantity Description[rc][nl]7 load Sand & Gravel[rc][nl]118 bags Portland Cement[rc][nl][rc][nl]Total Amount: Php. 38,820.00[rc][nl][rc][nl][rc][nl]This is in compliance with the requirement of R.A. 9184 otherwise known as ?Government Procurement Reform Act? and Its Implementing Rules & Regulations ? A.[rc][nl][rc][nl][rc][nl][rc][nl](Sgd.)       FLORANTE S. JARA[rc][nl]                 BAC-Chairman\/MPDC","special_instruction":"","notice_type":"Request for Quotation (RFQ)","tender_status":"Awarded","classification":"Goods","business_category":"Construction Materials and Supplies","procurement_mode":"Negotiated Procurement","funding_instrument":"Budget for the Contract Approved by the Sanggunian","funding_source":"Government of the Philippines (GOP)","approved_budget":38820,"contract_duration":"1 Day\/s","trade_agreement":"Implementing Rules and Regulations","pre_bid_date":null,"pre_bid_venue":"","procuring_entity_org":{"website":"http:\/\/www.cabugao.gov.ph","org_id":9375,"org_status":"Active","member_type":"Buyer","country_code":"PH","is_org_foreign":false,"member_type_id":2,"province":"Ilocos Sur","government_organization_type":"Municipal Government","org_reg_date":"2004-01-07T16:10:14","modified_date":"2011-08-19T10:38:23","zip_code":"2732","org_name":"MUNICIPALITY OF CABUGAO, ILOCOS SUR","city":"Cabugao","address1":"Municipal Hall,","address2":"","address3":"","parent_org_id":0,"org_description":"","goverment_branch":"Local Government Unit (LGU)","country":"Philippines","region":"Region I","_full_text":"'2732':23 'activ':24 'buyer':1 'cabugao':4,20 'govern':8,12 'hall':22 'iloco':5,18 'lgu':10 'local':7 'municip':2,11,21 'ph':14 'philippin':15 'region':16 'sur':6,19 'unit':9 'www.cabugao.gov.ph':13","supplier_form_of_organization":"","_id":65591,"supplier_organization_type":""},"publish_date":"2009-03-19T00:00:00","closing_date":"2009-03-20T17:00:00","contact":{"person":"Hermes A Asit","address":"Hermes A Asit[rc]Planning Asst.\/BAC Secretariat[rc]Municipal Hall,  [rc]Cabugao[rc]Ilocos Sur[rc]Philippines 2732"},"collection":{"contract":null,"point":""},"award_details":{"qty":0,"award_id":116026,"award_reason":"Negotiated Procurement","proceed_date":"2009-03-30T00:00:00","line_item_id":0,"item_description":"","unspsc_description":"","award_date":"2009-03-27T00:00:00","modified_date":"2009-03-27T11:13:56","contract_amt":38820,"item_name":"","previous_award_id":0,"awardee":"NEW DRAGON MERCHANDISING","is_reaward":false,"award_type":"Negotiated Procurement","contract_no":"Cab.-GSO-2009","uom":"","award_title":"Negotiated Procurement for the Construction Materials @ Barangay Cuancabal, Cabugao Ilocos Sur","contract_enddate":"2009-03-30T00:00:00","award_status":"Posted","reason":"","is_short_list":false,"unspsc_code":0,"ref_id":"832829","is_amp":false,"awardee_id":50597,"_full_text":"'-2009':23 '832829':1 'barangay':8 'cab':21 'cabugao':10 'construct':6 'cuancab':9 'dragon':15 'gso':22 'iloco':11 'materi':7 'merchandis':16 'negoti':2,17,19 'new':14 'post':13 'procur':3,18,20 'sur':12","budget":0,"publish_date":"2009-03-27T11:13:25","_id":3849,"contract_start_date":"2009-03-30T00:00:00"},"project_location":{"modified_date":"2009-03-18T11:23:16","_id":87559,"_full_text":"'832829':1 'iloco':2 'sur':3","refid":"832829","location":"Ilocos Sur"},"coordinates":{"south":16.651038,"west":120.3444579,"north":17.8923179,"east":120.878885}}];

        vm.tenderStatuses = [
            "Cancelled",
            "In-Preparation",
            "Closed",
            "Shortlisted",
            "Awarded",
            "Failed"
        ];

        vm.tenderStatusesChecked = [];
        vm.regions = [
            { "name": "ARMM", "provinces": [
                { "name": "Lanao del Sur" },
                { "name": "Maguindanao" },
                { "name": "Sulu" },
                { "name": "Tawi-Tawi" },
                { "name": "Basilan" }
            ]},
            { "name": "CAR", "provinces": [
                { "name": "Abra" },
                { "name": "Apayao" },
                { "name": "Benguet" },
                { "name": "Ifugao" },
                { "name": "Kalinga" },
                { "name": "Mountain Province" },
            ]},
            { "name": "NCR", "provinces": [
                { "name": "Metro Manila" }
            ]},
            { "name": "Region I", "provinces": [
                { "name": "Ilocos Norte" },
                { "name": "Ilocos Sur" },
                { "name": "La Union" },
                { "name": "Pangasinan" }
            ]},
            { "name": "Region II", "provinces": [
                { "name": "Batanes" },
                { "name": "Cagayan" },
                { "name": "Isabela" },
                { "name": "Nueva Vizcaya" },
                { "name": "Quirino" }
            ]},
            { "name": "Region III", "provinces": [
                { "name": "Aurora" },
                { "name": "Bataan" },
                { "name": "Bulacan" },
                { "name": "Nueva Ecija" },
                { "name": "Pampanga" },
                { "name": "Tarlac" },
                { "name": "Zambales" }
            ]},
            { "name": "Region IV-A", "provinces": [
                { "name": "Batangas" },
                { "name": "Cavite" },
                { "name": "Laguna" },
                { "name": "Quezon" },
                { "name": "Rizal" }
            ]},
            { "name": "Region IV-B", "provinces": [
                { "name": "Marinduque" },
                { "name": "Occidental Mindoro" },
                { "name": "Oriental Mindoro" },
                { "name": "Palawan" },
                { "name": "Romblon" }
            ]},
            { "name": "Region IX", "provinces": [
                { "name": "Zamboanga del Norte" },
                { "name": "Zamboanga del Sur" },
                { "name": "Zamboanga Sibugay" }
            ]},
            { "name": "Region V", "provinces": [
                { "name": "Albay" },
                { "name": "Camarines Norte" },
                { "name": "Camarines Sur" },
                { "name": "Catanduanes" },
                { "name": "Masbate" },
                { "name": "Sorsogon" }
            ]},
            { "name": "Region VI", "provinces": [
                { "name": "Aklan" },
                { "name": "Antique" },
                { "name": "Capiz" },
                { "name": "Guimaras" },
                { "name": "Iloilo" },
                { "name": "Negros Occidental" }
            ]},
            { "name": "Region VII", "provinces": [
                { "name": "Bohol" },
                { "name": "Cebu" },
                { "name": "Negros Oriental" },
                { "name": "Siquijor" }
            ]},
            { "name": "Region VIII", "provinces": [
                { "name": "Biliran" },
                { "name": "Eastern Samar" },
                { "name": "Leyte" },
                { "name": "Northern Samar" },
                { "name": "Samar" },
                { "name": "Southern Leyte" }
            ]},
            { "name": "Region X", "provinces": [
                { "name": "Bukidnon" },
                { "name": "Camiguin" },
                { "name": "Lanao del Norte" },
                { "name": "Misamis Occidental" },
                { "name": "Misamis Oriental" }
            ]},
            { "name": "Region XI", "provinces": [
                { "name": "Compostela Valley" },
                { "name": "Davao del Norte" },
                { "name": "Davao del Sur" },
                { "name": "Davao Occidental" },
                { "name": "Davao Oriental" }
            ]},
            { "name": "Region XII", "provinces": [
                { "name": "Cotabato" },
                { "name": "Sarangani" },
                { "name": "South Cotabato" },
                { "name": "Sultan Kudarat" }
            ]},
            { "name": "Region XIII", "provinces": [
                { "name": "Agusan del Norte" },
                { "name": "Agusan del Sur" },
                { "name": "Dinagat Islands" },
                { "name": "Surigao del Norte" },
                { "name": "Surigao del Sur" }
            ]
            }
        ];

        CategoryService
            .getAll()
            .then(function(response) {
                if(response.status != 'ok')
                    throw new Error('Error getting categories');
                vm.categories = [];
                _.each(response.data, function(i) {
                    vm.categories.push({
                        "name": i
                    });
                });
            });

        ClassificationService
            .getAll()
            .then(function(response) {
                if(response.status != 'ok')
                    throw new Error('Error getting classifications');
                vm.classifications = [];
                _.each(response.data, function(i) {
                    vm.classifications.push({
                        "name": i
                    });
                });
            });

        NoticeTypeService
            .getAll()
            .then(function(response) {
                if(response.status != 'ok')
                    throw new Error('Error getting notice types');
                vm.noticeTypes = [];
                _.each(response.data, function(i, x) {
                    vm.noticeTypes.push({
                        "id": x,
                        "name": i
                    });
                });
            })

        vm.applyFilters = function() {
            vm.filtersOpen = false;
            var selectedProvinces = _.pluck(_.where(_.flatten(_.pluck(vm.regions, 'provinces')), { selected: true }), 'name');
            var selectedCategories = _.pluck(_.where(vm.categories, { selected: true }), 'name');
            var selectedClassifications = _.pluck(_.where(vm.classifications, { selected: true }), 'name');

            if(!(selectedProvinces.length > 0 || selectedCategories.length > 0 || selectedClassifications.length > 0))
                return;

            SearchService
                .query({
                    'areas[]': selectedProvinces,
                    'categories[]': selectedCategories,
                    'classifications[]': selectedClassifications
                    // TODO year
                })
                .then(function(response) {
                    vm.searchResults = response.data;
                });
        };

        vm.showDetails = function(card) {
            vm.selectedCard = card;
            $mdSidenav('info').toggle();
            $scope.$root.mapConfig.markers.center['lat'] = card.coordinates.north - ((card.coordinates.north - card.coordinates.south) / 2);
            $scope.$root.mapConfig.markers.center['lng'] = card.coordinates.east - ((card.coordinates.east - card.coordinates.west) / 2);
        };


        /*
        MapService
            .getRegions()
            .then(function(response) {
                //if(response.status != 'ok')
                //    throw new Error('Error getting regions data');
                vm.regionData = {
                    data: response.geometries,
                    style: {
                        fillColor: "blue",
                        weight: 2,
                        opacity: 0.25,
                        color: 'white',
                        dashArray: '3',
                        fillOpacity: 0.25
                    }
                };

                vm.mapData = vm.regionData;
            });

        MapService
            .getProvinces()
            .then(function(response) {
                //if(response.status != 'ok')
                //    throw new Error('Error getting provinces data');
                vm.provinceData = {
                    data: response.geometries,
                    style: {
                        fillColor: "green",
                        weight: 0,
                        opacity: 0,
                        color: 'white',
                        dashArray: 0,
                        fillOpacity: 1
                    }
                };
            });
            */
    }

    // inject services to each controller constructor
    RootCtrl.$inject     = ['$scope', 'CategoryService', 'UtilityService', 'MapService', 'ClassificationService', 'SearchService', 'NoticeTypeService', '$mdSidenav'];

    // register controllers to Angular
    angular
        .module('app.controllers')
        .controller('RootCtrl', RootCtrl);
})(angular);
