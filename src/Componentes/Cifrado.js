
import React, { useState } from 'react';
import CryptoJS from 'crypto-js';
import './Cifrado.css';

function Cipher() {
  const [message, setMessage] = useState('');
  const [encryptedMessage, setEncryptedMessage] = useState('');
  const [decryptedMessage, setDecryptedMessage] = useState('');

  const secretKey = 'UnaClaveSuperSegura';

  const handleEncrypt = () => {
    const encrypted = CryptoJS.AES.encrypt(message, secretKey).toString();
    setEncryptedMessage(encrypted);
  };

  const handleDecrypt = () => {
    const decrypted = CryptoJS.AES.decrypt(encryptedMessage, secretKey);
    setDecryptedMessage(decrypted.toString(CryptoJS.enc.Utf8));
  };

  const handleClear = () => {
    setMessage('');
    setEncryptedMessage('');
    setDecryptedMessage('');
  };

  return (
    <div className="cipher-container">
      <h2>Cifrado y Descifrado AES</h2>
      <textarea
        placeholder="Escribe tu mensaje..."
        value={message}
        onChange={(e) => setMessage(e.target.value)}
      ></textarea>
      <div className="buttons">
        <button onClick={handleEncrypt}>Cifrar</button>
        <button onClick={handleDecrypt}>Descifrar</button>
        <button onClick={handleClear}>Limpiar</button>
      </div>
      <div className="result">
        {encryptedMessage && (
          <div className="result-item">
            <h3>Mensaje Cifrado:</h3>
            <p>{encryptedMessage}</p>
          </div>
        )}
        {decryptedMessage && (
          <div className="result-item">
            <h3>Mensaje Descifrado:</h3>
            <p>{decryptedMessage}</p>
          </div>
        )}
      </div>
    </div>
  );
}

export default Cipher;
