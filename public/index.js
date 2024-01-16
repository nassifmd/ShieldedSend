        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('encryptSerial').addEventListener('click', function() {
                var serialNumber = document.getElementById('serial_number').value;
                if (serialNumber) {
                    var encryptedSerial = CryptoJS.AES.encrypt(serialNumber, 'your-secret-key').toString();
                    document.getElementById('encryptedSerialValue').textContent = encryptedSerial;

                    // GSAP Animation for showing the encrypted serial popup
                    gsap.to('#encryptedSerialPopup', { opacity: 1, display: 'block', duration: 0.5 });
                }
            });
        });
        

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('encryptSerial').addEventListener('click', function() {
                var serialNumber = document.getElementById('serial_number').value;
                if (serialNumber) {
                    // Encrypt the serial number using CryptoJS AES encryption
                    var encryptedSerial = CryptoJS.AES.encrypt(serialNumber, 'your-secret-key').toString();
        
                    // Display the encrypted serial number in the popup
                    document.getElementById('encryptedSerialValue').textContent = encryptedSerial;
                    document.getElementById('encryptedSerialPopup').style.display = 'block';
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Function to decrypt the serial number
            function decryptSerial(encryptedSerial, secretKey) {
                var decryptedSerial = CryptoJS.AES.decrypt(encryptedSerial, secretKey);
                return decryptedSerial.toString(CryptoJS.enc.Utf8);
            }
        
            document.getElementById('decryptAndDownload').addEventListener('click', function() {
                var serialNumber = document.getElementById('serial_number').value;
                if (serialNumber) {
                    // Decrypt the serial number using CryptoJS AES encryption
                    var secretKey = 'your-secret-key';
                    var decryptedSerial = decryptSerial(serialNumber, secretKey);
        
                    // Set the decrypted serial number back to the input field
                    document.getElementById('serial_number').value = decryptedSerial;
        
                    // Submit the download form with the decrypted serial number
                    document.getElementById('downloadForm').submit();
                }
            });
        });

       // GSAP animation timeline
       const tl = gsap.timeline({ defaults: { ease: "power1.out" } });

       // Animation for header
       tl.from("header", { y: "-100%", duration: 1 });
       
       // Animation for hero section
       tl.from(".hero h2, h5, .hero p, .hero .cta-button", { opacity: 0, stagger: 0.5, duration: 1, delay: 0.5 });
       
       // Animation for features section
    //    tl.from(".feature", { opacity: 0, stagger: 0.5, duration: 1 });
       
       // Animation for footer
    //    tl.from("footer", { y: "100%", duration: 1, delay: 0.5 });
       

// how to use
       gsap.set(".information", { yPercent: 100 });

        gsap.utils.toArray(".containa").forEach((containa) => {
        let info = containa.querySelector(".information"),
            silhouette = containa.querySelector(".silhouette .cover"),
            tl = gsap.timeline({ paused: true });

        tl.to(info, { yPercent: 0 }).to(silhouette, { opacity: 0 }, 0);

        containa.addEventListener("mouseenter", () => tl.timeScale(1).play());
        containa.addEventListener("mouseleave", () => tl.timeScale(3).reverse());
    });